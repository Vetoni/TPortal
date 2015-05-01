<?php

use frontend\assets\AppAsset;
use frontend\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$this->title = $this->title
    ? Yii::t('app', 'Foreign tour') . " | $this->title"
    : Yii::t('app', 'Foreign tour');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <!-- Header -->
    <header id="header">
        <!-- Logo -->
        <a href="<?= Url::home() ?>">
            <img src="img/<?= Yii::$app->language ?>/logo.png" alt="">
        </a>
    </header>

    <!-- Top menu -->
    <nav id="top-nav" role="navigation">
        <?= Menu::widget() ?>
    </nav>

    <?= $content ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
