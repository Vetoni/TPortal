<?php
use common\models\TourType;
use yii\helpers\Url;
use yii\helpers\Html;
?>

<?php foreach (TourType::getTypes()->all() as $type) : ?>
    <a class="type" href="<?= Url::to(['tour-type/index', 'id' => $type->tid]) ?>"><?= $type->name ?></a>
    <ul class="subtype">
        <?php foreach ($type->children as $subtype) : ?>
            <li>
                <a href="<?= Url::to(['tour-sub-type/index', 'id' => $subtype->tid, 'type' => $type->tid]) ?>">
                    <?= Html::img('@web/img/cat.png') ?><?= $subtype->name ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>