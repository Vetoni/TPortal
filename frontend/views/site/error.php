<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="error-page">
    <div class="row">
        <div class="col-xs-12">
            <h3 class="content-item-caption">
                <?= property_exists($exception, 'statusCode') ? $exception->statusCode : 500 ?>
            </h3>
            <div class="content-item">
                <h3><i class="fa fa-warning text-yellow"></i> <?= Html::encode($name) ?></h3>
                <p>
                    <?= nl2br(Html::encode($message)) ?>
                </p>
            </div>
        </div>
    </div>
</div><!-- /.error-page -->
