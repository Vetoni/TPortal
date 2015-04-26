<?php

use yii\helpers\Url;

if ($model) {
    $itemsPerRow = 3;
    $rows = ceil(count($model) / $itemsPerRow);
    for ($row = 0; $row < $rows; $row++) :
        $tours = array_slice($model, $row * $itemsPerRow, $itemsPerRow);
        ?>
        <div class="search-result">
            <?php foreach ($tours as $tour): ?>
                <div>
                    <a href="<?= Url::to(['tour/view', 'id' => $tour->nid]) ?>">
                        <img src="<?= $tour->imagePath ?>">
                    </a>
                    <p><?= $tour->title ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php
    endfor;
}
else {
    echo "<p>" . Yii::t('app', 'No tours found') . "</p>";
}
?>