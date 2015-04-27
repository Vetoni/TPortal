<?php
use common\models\TourType;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $type common\models\TourType */

?>

<?php
foreach (TourType::getTypes()->all() as $type) {
    $content = NULL;
    foreach ($type->children as $subtype) {
        if ($subtype->getTours()->count() > 0) {
            $content .= "<li>";
            $content .= "<a href = \"" . Url::to(['tour-sub-type/view', 'pid' => $type->tid, 'tid' => $subtype->tid]) . "\">";
            $content .= Html::img('@web/img/cat.png') . $subtype->name . " (" .  $subtype->getTours()->count() . ")";
            $content .= "</a>";
            $content .= "</li>";
        }
    }
    if ($content) {
        echo Html::a($type->name, Url::to(['tour-type/view', 'id' => $type->tid]), ['class' => 'type']);
        echo "<ul class=\"subtype\">";
        echo $content;
        echo "</ul>";
    }
}
?>