<?php

namespace frontend\controllers;
use yii\web\Controller;

/**
 * Class TourTypeController
 * @package frontend\controllers
 */
class TourTypeController extends Controller
{
    /**
     * @return mixed
     */
    public function actionIndex($id)
    {
        return $this->render('index');
    }
}