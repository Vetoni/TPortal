<?php

namespace backend\widgets;

use Yii;
use yii\base\InvalidValueException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\Request;

/**
 * Widget for sidebar menu.
 * @package backend\widgets
 */
class Menu extends Widget {

    /**
     * @var
     */
    public $items;

    /**
     * @return string
     */
    public function run()
    {
        return array_reduce($this->items, function ($a, $b) {
            return $a . $this->renderItem($b);
        });
    }

    /**
     * Renders item.
     * @param $item
     * @return string
     */
    public function renderItem($item)
    {
        switch ($item['type']) {
            case 'header':
                return $this->renderMenuHeader($item);
            case 'section':
                return $this->renderMenuSection($item);
            case 'item':
                return $this->renderMenuItem($item);
            default:
                throw new InvalidValueException('Unknown menu item type = ' . $item['type']);
        }
    }

    /**
     * Renders menu header.
     * Allowed header attributes:
     *     type string
     *     title string
     * @param $header
     * @return string
     */
    public function renderMenuHeader($header)
    {
        return Html::tag('li', $header['title'], ['class' => 'header']);
    }

    /**
     * Renders menu item.
     * Allowed item attributes:
     *     type string
     *     class string
     *     title string
     *     url string
     *     extra array of [ class string, content string ]
     * @param $item
     * @return string
     */
    public function renderMenuItem($item)
    {
        $content = Html::tag('i', '', ['class' => "fa {$item['class']}"]);
        $content .= $item['title'];

        if (array_key_exists('extra', $item)) {
            $content .= Html::tag('small',
                $item['extra']['content'],
                ['class' => "label pull-right {$item['extra']['class']}"]);
        }

        $active = $this->isActive($item['url']);
        $a = Html::tag('a', $content, ['href' => $item['url']]);
        return Html::tag('li', $a, $active ? ['class' => 'active'] : []);
    }

   /**
     * Renders menu section.
     * Allowed section attributes:
     *     type string
     *     class string
     *     title string
     *     items array
     * @param $section
     * @return string
     */
    public function renderMenuSection($section)
    {
        $a_inner = Html::tag('i', '', ['class' => "fa {$section['class']}"]);
        $a_inner .= $section['title'];
        $a_inner .= Html::tag('i', '', ['class' => "fa fa-angle-left pull-right"]);
        $a = Html::tag('a', $a_inner, ['href' => '#']);
        $sectionActive = false;

        // Render menu section items.
        $ul_inner = array_reduce($section['items'], function ($a, $b) use (&$sectionActive) {
            $a .= $this->renderMenuSectionItem($b, $active);

            //Section becomes active when at least one menu items is active.
            if ($active) {
                $sectionActive = true;
            }
            return $a;
        });
        $ul = Html::tag('ul', $ul_inner, ['class' => 'treeview-menu']);
        return Html::tag('li', $a . $ul, $sectionActive ? ['class' => 'active treeview'] : ['treeview']);
    }

    /**
     * Renders section item section item.
     * Allowed section attributes:
     *     url string
     *     title string
     *     class string
     * @param $item
     * @param $active
     * @return string
     */
    public function renderMenuSectionItem($item, &$active)
    {
        $a_inner = Html::tag('i', '', ['class' => "fa {$item['class']}"]);
        $a_inner .= $item['title'];
        $li_inner = Html::tag('a', $a_inner, ['href' => $item['url']]);
        $active = $this->isActive($item['url']);
        return Html::tag('li', $li_inner, $active ? ['class' => 'active'] : []);
    }

    /**
     * Determines whether a menu item url corresponds to the current request.
     * @param $url
     * @return bool
     */
    public function isActive($url) {
        $request = new Request();
        $request->setUrl($url);
        $route = Yii::$app->urlManager->parseRequest($request)[0];
        $path_c = explode('/', $route)[0];
        $controller = Yii::$app->controller->id;
        return $path_c == $controller;
    }

}