<?php

namespace frontend\controllers;


use yii\web\Controller;

class TourController extends Controller {
    public function actionIndex() {
        return $this->render('index');
    }

}