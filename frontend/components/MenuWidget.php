<?php

namespace frontend\components;

use yii\bootstrap\Widget;
use frontend\models\Menu;

/**
 * Class MenuWidget
 * @package frontend\components
 */
class MenuWidget extends Widget {

    /**
     * @var id markup attribute for menu list.
     */
    public $id;

    /**
     * Initialize menu widget
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Renders menu widget.
     * @return string
     */
    public function run()
    {
        $items = Menu::getTopLevelNodes();
        return $this->render('/shared/top_menu', ['menuId' => $this->id, 'items' => $items]);
    }
}