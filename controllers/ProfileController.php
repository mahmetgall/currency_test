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
	

}