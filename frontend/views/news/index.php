<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model array */

?>

<?= $this->render('/shared/_list', [
    'source' => $news,
    'getUrl' => function($item) { return Url::to(['news/view', 'id' => $item->nid]); }
]) ?>