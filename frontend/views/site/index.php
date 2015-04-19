<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Главная страница';
?>
<a class="content-item" href="">О Компании</a>
<p> «О компании» - содержит краткую информацию раздела со ссылкой  «О компании» - содержит краткую информацию раздела со ссылкой  «О компании» - содержит краткую информацию раздела со ссылкой  «О компании» - содержит краткую информацию раздела со ссылкой </p>

<a class="content-item" href="">Новости</a>

<?php foreach($news as $item): ?>
    <div class="new">
        <a href=""><img src="/img/new.jpg" alt=""></a>
        <h3><a href="<?= Url::to('news', ['id' => $item->nid]) ?>"><?= $item->title ?></a></h3>
        <p><?= $item->announce ?></p>
        <a class="more" href="<?= Url::to('news', ['id' => $item->nid]) ?>">Читать далее</a>
    </div>
    <div class="clr"></div>
<?php endforeach; ?>
