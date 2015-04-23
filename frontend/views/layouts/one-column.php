<?php
$this->beginContent('@frontend/views/layouts/base.php');
?>

<div id="content">
    <div class="center">
        <?= $content ?>
    </div>
    <div class="clr"></div>
</div>

<?php $this->endContent(); ?>