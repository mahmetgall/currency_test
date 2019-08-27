<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use app\models\User;
use app\models\Currency;


/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CurrencyController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $this->getCurrencyFromCBR();
		echo 'ok';

        return ExitCode::OK;
    }
	
	/*
	 * Получить курсы валют с сайта центробанка
	 */
	private function getCurrencyFromCBR()
	{
		$url = 'http://www.cbr.ru/scripts/XML_daily.asp';
		$curl = curl_init($url);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Cache-Control: no-cache'));
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	    curl_setopt($curl, CURLOPT_FRESH_CONNECT, TRUE);
		
	    $result = curl_exec($curl);
	   
		$xml = new \SimpleXMLElement($result);
		
		curl_close($curl);

		$this->saveCurrency($xml);
		
	}
	
	/*
	 * Распарсить xml и записать в базу курсы валют
	 */
	private function saveCurrency($xml)
	{
		
		foreach ($xml->Valute as $valute) {
			$num_code =  $valute->NumCode;
			
			$model = Currency::find()->where(['num_code' => $num_code])->one();
			
			if (!$model) {
				$model = new Currency();
				$model->name = (string)$valute->Name;
				$model->num_code = (int)$valute->NumCode;
				$model->char_code = (string)$valute->CharCode;
				
			}
			$model->nominal = (int)$valute->Nominal;
			$value = str_replace(',', '.' ,(string)$valute->Value);
			$model->value = $value;
		
			if (!$model->save()) {
				var_dump($model->getErrors());
				
			}
			
		}
		
	}


}
