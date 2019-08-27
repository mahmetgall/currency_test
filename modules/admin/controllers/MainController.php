<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
 use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Default controller for the `admin` module
 */
class MainController extends Controller
{
   
	public $layout = 'main';

	
	   public function behaviors()
    {
		
				
        return [
            'access' => [
                'class' => AccessControl::className(),
               
                'rules' => [
                    [
                        
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
				
                ],
            ],
           
        ];
    }

}
