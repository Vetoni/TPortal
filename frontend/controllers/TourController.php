<?php

namespace frontend\controllers;


use yii\web\Controller;

/**
 * Class TourController
 * @package frontend\controllers
 */
class TourController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }
}