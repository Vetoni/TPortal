<?php

/* @var $source array */
/* @var $getUrl Callable */

if ($source):
    $itemsPerRow = 3;
    $rows = ceil(count($source) / $itemsPerRow);
    for ($row = 0; $row < $rows; $row++) :
        $rowItems = array_slice($source, $row * $itemsPerRow, $itemsPerRow);
        ?>
        <div class="search-result">
            <?php foreach ($rowItems as $item): ?>
                <div>
                    <a href="<?= call_user_func($getUrl, $item) ?>">
                        <img src="<?= $item->imagePath ?>">
                    </a>
                    <p>
                        <a href="<?= call_user_func($getUrl, $item) ?>">
                            <?= isset($item->name) ? $item->name : $item->title ?>
                        </a>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php
    endfor;
else : ?>
    <div class="search-result">
        <p><?= Yii::t('app', 'No results found') ?></p>
    </div>
<?php endif; ?>