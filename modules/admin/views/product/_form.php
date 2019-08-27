<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Config;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
 
	<div class="product-form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

		

		<?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'description')->textInput() ?>
		
		<?php 
			if ($model->img) {
				echo '<img src="'. Config::IMG_PRODUCT . $model->img . '" width="250">';
			}
		?>
		
		<?= $form->field($model, 'imgFile')->fileInput() ?>

		<div class="form-group">
			<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	
 </div>
