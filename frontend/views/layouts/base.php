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
$lang = Yii::$app->language;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
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
            <?= Html::img("@web/img/$lang/logo.png") ?>
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
