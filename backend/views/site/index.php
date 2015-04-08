<?php
/* @var $this yii\web\View */
use moonland\tinymce\TinyMCE;

$this->title = 'Админка';
?>
Крутой редактор тайни эм-си-и
<?php
echo TinyMCE::widget(['name' => 'text-content']);
?>
