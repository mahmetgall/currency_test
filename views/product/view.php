<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['/product']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
 <div class="container">
	<div class="product-view">

		<h1><?= Html::encode($this->title) ?></h1>



		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				'id',
				'name',
				'code',
				'img',
				'price',
				'description',
			],
		]) ?>

	</div>
 </div>
