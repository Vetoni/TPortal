<?php

namespace common\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class DropDownListWidget extends Widget
{
    public $model = null;
    public $attribute = null;
    public $value = '';
    public $htmlOptions = [];

    protected $items;

    public function run()
    {
        $this->items = ArrayHelper::merge(['' => ''], $this->items);
        $this->htmlOptions = ArrayHelper::merge($this->htmlOptions, ['name' => $this->attribute, 'class' => 'form-control']);
        if (!is_null($this->model)) {
            echo Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->htmlOptions);
        } else {
            echo Html::dropDownList($this->attribute, $this->value, $this->items, $this->htmlOptions);
        }
    }
}