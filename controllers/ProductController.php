<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
   
    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

   /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	/*
	 * Личный кабинет + вывод товаров
	 */
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

}
