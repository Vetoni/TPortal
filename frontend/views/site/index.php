<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Home page');
Yii::$app->params["showCarousel"] = true;
?>

<?= Html::a(Yii::t('app', 'About company'), Url::to('site/about'), ['class'=>'content-item'])  ?>

<p>
    Не добавить ли тут какойто рисунок в тексте?
</p>

<p>
    Параграф 1
</p>

<p>
    Параграф 2
</p>

<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mi dui, luctus in metus et, facilisis gravida ex. Nulla tempor lorem nec mauris tempor, eget auctor neque semper. Etiam molestie consectetur pretium. Vestibulum id vestibulum diam, vel sodales ante. Fusce molestie felis et nulla elementum auctor. Morbi vehicula leo quis congue eleifend. Sed tristique est at sem accumsan tempor. Vivamus et enim porta, faucibus augue tristique, ultricies ipsum. Maecenas ut sem eu tellus faucibus interdum vel non purus. Donec tellus elit, tristique vel tincidunt sit amet, blandit ac risus. Sed eget dui ut leo sagittis venenatis.

    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc sed semper ligula. Donec id leo eu elit scelerisque rhoncus. Quisque efficitur justo vel felis commodo viverra. Vestibulum sed sem ac erat mollis feugiat. Suspendisse potenti. Cras vehicula turpis at vestibulum ultricies. Curabitur nulla tortor, vestibulum et sem in, dictum rutrum ante. Etiam eget nulla ante.

    Sed ornare leo et metus aliquam vehicula. Phasellus porta erat sed elementum venenatis. Pellentesque accumsan tristique tortor. Sed orci libero, semper ac est non, ultricies vestibulum leo. Donec nec ornare purus. Cras eleifend dignissim interdum. Sed vulputate mauris in sem efficitur, ut malesuada magna semper. Pellentesque auctor massa non tortor viverra semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed consectetur vehicula consectetur. Cras sed erat a elit lacinia porttitor a eget lorem. Integer erat erat, tincidunt eget eleifend sit amet, vestibulum facilisis lacus.

    Morbi cursus augue ex, nec pretium ligula lobortis sed. Suspendisse elementum dictum nibh, consequat semper risus efficitur et. Aliquam convallis condimentum dui, at cursus sapien blandit et. In hac habitasse platea dictumst. Suspendisse lacinia interdum leo, ut sollicitudin eros posuere nec. Quisque id elit ut nunc bibendum luctus id eu velit. Fusce vitae ultricies massa. Nullam posuere enim et est pretium consequat. Aenean sit amet arcu commodo, lobortis lorem ut, tempor enim. Duis id posuere lectus. Pellentesque in urna tempor dui tempor rhoncus sed euismod sapien. Suspendisse quis placerat nisi. Nulla in feugiat sem. Nullam sagittis quam vel sodales vehicula. Nulla ultricies, sem eget finibus hendrerit, turpis dolor sodales lacus, quis vestibulum dolor lorem et mauris. Mauris quam enim, suscipit vitae lobortis quis, condimentum sed dui.

    Nam id tellus a nisl laoreet sodales. Quisque eu ante in orci luctus porttitor et sit amet risus. Ut tempor est ac diam pellentesque, ut pulvinar nibh facilisis. Vivamus vitae mauris at erat feugiat pretium vel ac sem. Donec varius tempor nisl, condimentum malesuada lorem convallis nec. Vestibulum quis sapien lacus. Mauris et placerat neque, nec commodo nisi. Nunc id tristique tortor. Morbi ipsum odio, dictum ac metus ac, tincidunt ultrices purus. Fusce id tellus nisi. Praesent gravida facilisis orci.  </p>

<?= Html::a(Yii::t('app', 'News'), Url::to('news/index'), ['class'=>'content-item'])  ?>
<?php
foreach($news as $item):
    $url = Url::to(['news/view', 'id' => $item->nid]);
    ?>
    <div class="news-item">
        <a href="<?= $url ?>"><img src="<?= $item->imagePath ?>" alt=""></a>
        <h3><a href="<?= $url ?>"><?= $item->title ?></a></h3>
        <?= $item->announce ?>
        <a class="more" href="<?= $url ?>"><?= Yii::t('app', 'More details'); ?></a>
    </div>
    <div class="clr"></div>
<?php endforeach; ?>
