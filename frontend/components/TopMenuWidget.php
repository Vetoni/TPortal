<?php

namespace frontend\components;

use yii\bootstrap\Widget;
use frontend\models\TopMenu;

class TopMenuWidget extends Widget {

    public $id;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $items = TopMenu::getTopOnly();
        return $this->render('/shared/top_menu', ['menuId' => $this->id, 'items' => $items]);
    }
}