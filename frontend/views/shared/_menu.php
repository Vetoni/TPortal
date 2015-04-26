<?php
use common\models\TourType;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $type common\models\TourType */

?>

<?php foreach (TourType::getTypes()->all() as $type) : ?>
    <a class="type" href="<?= Url::to(['tour-type/view', 'id' => $type->tid]) ?>"><?= $type->name ?></a>
    <ul class="subtype">
        <?php foreach ($type->children as $subtype) : ?>
            <li>
                <a href="<?= Url::to(['tour-sub-type/view', 'pid' => $type->tid, 'tid' => $subtype->tid]) ?>">
                    <?= Html::img('@web/img/cat.png') ?><?= $subtype->name ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>