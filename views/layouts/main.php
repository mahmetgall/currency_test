<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

use yii\widgets\Breadcrumbs;

use app\assets\AppAsset;
use app\widgets\Alert;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="main">


        <div class="container">

            <?= Alert::widget() ?>

        </div>

        <div class="container">
            <div class="row top_menu">
                <div class="col-md-1">О нас</div>
                <div class="col-md-1">Контакты</div>
                <div class="col-md-3">

                    
                </div>

                <div class="col-md-2 ">

                    
                </div>

                <div class="col-md-3 col-md-push-1 talignr"><?= Yii::$app->user->isGuest ? '<a href="/signup">Зарегистрироваться</a>' : '<a href="/profile">Личный кабинет</a>'?></div>
                <div class="col-md-1 col-md-push-1 talignr"><?= Yii::$app->user->isGuest ? '<a href="/login">Войти</a>' : '<a href="/logout">Выйти</a>'?></div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <a href="/"><img class="logo" src="/images/logo.jpg" width="100px"></a>
                </div>
                <div class="col-lg-6">
                <h1 class="title">Интернет магазин</h1>
                </div>
                <div class="col-lg-4 talignr">

                </div>

            </div>

            <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Главная', 'url' => '/'],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

            ]);?>


           
        </div>


        <?= $content ?>


    </div main>
</div wrap>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>





</body>
</html>
<?php $this->endPage() ?>
