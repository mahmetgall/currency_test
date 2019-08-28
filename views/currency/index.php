<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

use app\models\Config;
use app\models\Right;

/* @var $this yii\web\View */
Yii::$app->view->registerJsFile('/js/select_curr.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>
<div class="container">
    <?php
        $this->title = 'Валюты:';
        $this->params['breadcrumbs'][] = $this->title;
    ?>

    <div class="container">
        <div class="row">
            
            <div class="col-lg-12" >

                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Мои валюты:</h1>
                            <table class="zakaz">
                                <tr>
									<td class="bold">Выбрать
                                    <td class="bold">Название
									<td class="bold">Код
									<td class="bold">Текстовый код
										
									<td class="bold">Номинал
									<td class="bold">Курс
                                    
                                        <?php
                                        foreach ($currencies as $currency){
											$check = '';
											foreach($user_currencies as $user_currency) {
												if ($currency['id'] == $user_currency['currency_id']) {
													$check = 'checked';
													break;
												}
											}
                                        ?>
                                            <tr>
												<td style="text-align:center"> <?= '<input class="select_curr" type="checkbox" data-id="' . $currency['id'] . '" ' . $check . '>'; ?>
												<td> <?= $currency['name']; ?>
												<td> <?= str_pad($currency['num_code'], 3, '0', STR_PAD_LEFT); ?>
												<td> <?= $currency['char_code']; ?>
													
												<td> <?= $currency['nominal']; ?>
                                                <td> <?= $currency['value']; ?>
                                                
                                        <?php

                                        }

                                        ?>

                            </table>

                        </div>
                    </div>

            </div>
        </div>
        <br><br>
    </div>

</div>

