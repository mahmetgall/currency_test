<?php

namespace app\controllers;

use Yii;
use app\models\Currency;
use app\models\UserCurrency;

class CurrencyController extends \yii\web\Controller {

	/*
	 * Добавить или удалить выбранную валюту текущему пользователю
	 */
	public function actionSelectCurrency() {
		if (Yii::$app->request->isAjax) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

			$result = Yii::$app->request->post();

			if (isset($result['id']) && isset($result['check'])) {
				$currency_id = (int) $result['id'];
				$check = (int) $result['check'];
				$user_id = Yii::$app->user->id;

				$Currency = Currency::find()->where(['id' => $currency_id])->one();
				$UserCurrency = UserCurrency::find()->where(['currency_id' => $currency_id, 'user_id' => $user_id])->one();
				if ($check == 1) {
					if ($Currency && !$UserCurrency) {
						$UserCurrency = new UserCurrency();
						$UserCurrency->user_id = $user_id;
						$UserCurrency->currency_id = $currency_id;
						if (!$UserCurrency->save()) {
							\Yii::$app->response->statusCode = 404;
							return ['error' => $UserCurrency->getErrors()];
						}
						return 'ok';
					}
				} else {
					if ($Currency && $UserCurrency) {
						$UserCurrency->delete();
						return 'ok';
						
					}
				}
			}
		}
		
		\Yii::$app->response->statusCode = 404;
		return 'error';
	}

}
