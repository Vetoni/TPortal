<?php

/* @var $source array */
/* @var $getUrl Callable */

if (count($source) > 0):

foreach($source as $item):
    $url = call_user_func($getUrl, $item);
    ?>
    <div class="content-item">
        <a href="<?= $url ?>"><img src="<?= $item->imagePath ?>" alt=""></a>
        <h3><a href="<?= $url ?>"><?= $item->title ?></a></h3>
        <?= $item->announce ?>
        <a class="more" href="<?= $url ?>"><?= Yii::t('app', 'More details'); ?></a>
    </div>
    <div class="clr"></div>
<?php endforeach; ?>

<?php else: ?>
    <div class="content-item">
        <p><?= Yii::t('app', 'No results found') ?></p>
    </div>
    <div class="clr"></div>
<?php endif; ?>

