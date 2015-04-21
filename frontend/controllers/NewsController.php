<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 * Class NewsController
 * @package frontend\controllers
 */
class NewsController extends Controller
{
    /**
     * View action method
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        return $this->render('view', ['id' => $id]);
    }
}