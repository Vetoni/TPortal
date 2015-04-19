<?php

namespace frontend\controllers;
use yii\web\Controller;

/**
 * Class TourSubTypeController
 * @package frontend\controllers
 */
class TourSubTypeController extends Controller
{
    /**
     * @return mixed
     */
    public function actionIndex($type, $id)
    {
        return $this->render('index');
    }
}