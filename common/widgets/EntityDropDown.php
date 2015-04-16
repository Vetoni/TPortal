<?php

namespace common\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class EntityDropDown
 * @package common\widgets
 */
class EntityDropDown extends Widget
{
    /**
     * @var \yii\base\Model
     */
    public $model;
    /**
     * @var string
     */
    public $attribute;
    /**
     * @var string
     */
    public $value = '';
    /**
     * @var array
     */
    public $htmlOptions = [];

    /**
     * @var
     */
    protected $items;

    /**
     * @inheritdoc
     */
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