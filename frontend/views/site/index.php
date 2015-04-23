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
<?php
foreach($news as $item):
    $url = Url::to(['news/view', 'id' => $item->nid]);
    ?>
    <div class="news-item">
        <a href="<?= $url ?>"><img src="<?= $item->imagePath ?>" alt=""></a>
        <h3><a href="<?= $url ?>"><?= $item->title ?></a></h3>
        <?= $item->announce ?>
        <a class="more" href="<?= $url ?>"><?= Yii::t('app', 'More details'); ?></a>
    </div>
    <div class="clr"></div>
<?php endforeach; ?>
