<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

use app\models\Config;
use app\models\Right;

/* @var $this yii\web\View */


?>
<div class="container">
    <?php
        $this->title = 'Товары:';
        $this->params['breadcrumbs'][] = $this->title;
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <br>
                <div class="prof">
                    <div class="prof_title">
                        Личный кабинет
                    </div>

                    <?= Html::a('Товары', ['/profile']); ?>
                    <br>
					<?= Html::a('Валюты', ['/profile/currency']); ?>
                    <br>
					
                    <?= Html::a('Профиль', ['/profile/info']); ?>
                    <?php
                        // пункт показывается только админу
                        if (Right::isAdmin()) {
                            echo '<br>';
                            echo Html::a('Управление товарами', ['/admin/product']);
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-8" >

                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Мои товары:</h1>
                            <table class="zakaz">
                                <tr>
                                   
                                    <td class="bold">Название
									<td class="bold">Артикул
									<td class="bold">Цена, руб
										<?php
											foreach($currencies as $currency) {
												echo '<td class="bold">Цена, '.$currency['char_code'];
											}
										?>
									<td class="bold">Фото
                                    <td class="bold">Описание
                                        <?php
                                        foreach ($products as $product){
                                        ?>
                                            <tr>
                                                
                                                <td><?= Html::a($product['name'], ['/product/view/', 'id' => $product['id']]); ?>
												<td><?= Html::a($product['code'], ['/product/view/', 'id' => $product['id']]); ?>
													
												<td><?= Html::a($product['price'], ['/product/view/', 'id' => $product['id']]); ?>
													
													<?php
														foreach($currencies as $currency) {
															$price = round(($product['price'] / $currency['value']) * $currency['nominal'],2);
															echo '<td>' . Html::a($price, ['/product/view/', 'id' => $product['id']]); 
														}
													?>
													
												<td><?= $product['img'] ? Html::a('<img src="'. Config::IMG_PRODUCT . $product['img'] . '" width="100">', ['/product/view/', 'id' => $product['id']]) : ''; ?>	
                                                <td><?= Html::a($product['description'], ['/product/view/', 'id' => $product['id']]); ?>
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

