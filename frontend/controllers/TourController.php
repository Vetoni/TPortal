<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TourSearch;
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
        $model = new TourSearch();
        $searchResult = null;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->search();
        }
        return $this->render('index', ['model' => $model]);
    }
}