<?php

/* @var $source array */
/* @var $getUrl Callable */

if ($source):
    $itemsPerRow = 3;
    $rows = ceil(count($source) / $itemsPerRow);
    for ($row = 0; $row < $rows; $row++) :
        $rowItems = array_slice($source, $row * $itemsPerRow, $itemsPerRow);
        ?>
        <div class="content-item">
            <?php foreach ($rowItems as $item): ?>
                <div class="grid-column">

                        <a href="<?= call_user_func($getUrl, $item) ?>">
                            <img src="<?= $item->imagePath ?>">
                        </a>
                        <p>
                            <?= isset($item->name) ? $item->name : $item->title ?>
                        </p>

                </div>
            <?php endforeach; ?>
            <div class="clr"></div>
        </div>
    <?php
    endfor;
else : ?>
    <div class="content-item">
        <p><?= Yii::t('app', 'No results found') ?></p>
    </div>
<?php endif; ?>