<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\models\Right;



/* @var $this yii\web\View */




?>
<div class="container">
    <?php
        $this->title = 'Моя информация:';
        $this->params['breadcrumbs'][] = $this->title;
    ?>

    <div class="container">
        <div class="row">
            
            <div class="col-lg-12" >
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Моя информация:</h1>

                            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                            <div><b>Email: </b>
                                <?= $model->username; ?>
                            </div>
                            <br>


                            <?= $form->field($model, 'fio') ?>


                            <div class="form-group">
                                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                            <hr>
                            <h2>Введите новый пароль:</h2>
                            <?php $form = ActiveForm::begin(['id' => 'pass-signup']); ?>

                            <?= $form->field($password, 'password')->passwordInput() ?>
                            <?= $form->field($password, 'password_repeat')->passwordInput() ?>
                            <div class="form-group">
                                <?= Html::submitButton('Изменить пароль', ['class' => 'btn btn-primary', 'name' => 'pass-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>


                        </div>
                    </div>


            </div>
        </div>
        <br><br>
    </div>


</div>


