<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Home page');
Yii::$app->params["showCarousel"] = true;
?>

<?= Html::a(Yii::t('app', 'About company'), Url::to('site/about'), ['class'=>'content-item'])  ?>

<?= $homePage->description ?>

<?= Html::a(Yii::t('app', 'News'), Url::to('news/index'), ['class'=>'content-item'])  ?>

<?= $this->render('/shared/_list', [
    'source' => $news,
    'getUrl' => function($item) { return Url::to(['news/view', 'id' => $item->nid]); }
]) ?>