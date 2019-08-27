<?php
namespace app\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\SignupForm;
use app\models\Password;
use app\models\Product;
use app\models\Currency;
use app\models\UserCurrency;






/**
 * Profile controller
 */
class ProfileController extends Controller
{
	    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                
                'rules' => [
                    [
                        
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    
                ],
            ],

        ];
    }

	
	
    public function actionIndex($id = 0)
    {
        $products = Product::find()->asArray()->all();
		$mUser = User::findIdentity(Yii::$app->user->id);
		
        return $this->render('index',
            [
                'products' =>$products,
				'currencies' => $mUser->currency,
            ]
        );

    }

    /*
     * просмотр профиля
     */
    public function actionInfo()
    {

        $mUser = User::findIdentity(Yii::$app->user->id);
        if (!$mUser){
            die('error');
        }

        $model = new SignupForm();
        $model->username = $mUser->username;
        $model->fio = $mUser->fio;

        $password = new Password();

        if ($model->load(Yii::$app->request->post())) {
            $mUser->fio = $model->fio;
            if (!$mUser->save()) {
                var_dump($mUser->getErrors());
                die();
            }
        }

        if ($password->load(Yii::$app->request->post())) {
            $mUser->setPassword($password->password);
            $mUser->generateAuthKey();
            $mUser->save();
            $password = new Password();
        }

        return $this->render('info',
            [
                'model' => $model,
                'password' => $password,
            ]
        );

    }
	
	 public function actionCurrency($id = 0)
    {
        $currencies = Currency::find()->asArray()->all();
		$user_id = Yii::$app->user->id;
		$user_currencies = UserCurrency::find()->where(['user_id' => $user_id])->asArray()->all();
		
		
        return $this->render('currency',
            [
                'currencies' =>$currencies,
				'user_currencies' => $user_currencies,
            ]
        );

    }

}