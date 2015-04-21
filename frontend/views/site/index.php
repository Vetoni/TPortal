<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Главная страница';
?>
<a class="content-item" href="">О Компании</a>
<p> «О компании» - содержит краткую информацию раздела со ссылкой  «О компании» - содержит краткую информацию раздела со ссылкой  «О компании» - содержит краткую информацию раздела со ссылкой  «О компании» - содержит краткую информацию раздела со ссылкой </p>

<a class="content-item" href="">Новости</a>

<?php
foreach($news as $item):
    $url = Url::to(['news/view', 'id' => $item->nid]);
    ?>
    <div class="new">
        <a href="<?= $url ?>"><img src="<?= $item->imagePath ?>" alt=""></a>
        <h3><a href="<?= $url ?>"><?= $item->title ?></a></h3>
        <?= $item->announce ?>
        <a class="more" href="<?= $url ?>">Читать далее</a>
    </div>
    <div class="clr"></div>
<?php endforeach; ?>
