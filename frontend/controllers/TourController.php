<?php

namespace frontend\controllers;

use common\models\Tour;
use Yii;
use frontend\models\TourSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class TourController
 * @package frontend\controllers
 */
class TourController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new TourSearch();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->search();
        }
        return $this->render('index', ['model' => $model]);
    }

    /**
     * @return string
     */
    public function actionSpecial()
    {
        $tours = Tour::find()
            ->andWhere(['s.special_order' => true])
            ->orderBy('node.changed')
            ->limit(15)
            ->all();

        return $this->render('special', ['tours' => $tours]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $tour = Tour::findOne($id);

        if ($tour == null) {
            throw new NotFoundHttpException();
        }

        return $this->render('view', ['tour' => $tour]);
    }
}