<?php

namespace frontend\controllers;
use common\models\TourType;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class TourTypeController
 * @package frontend\controllers
 */
class TourTypeController extends Controller
{
    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $type = TourType::findOne($id);
        if ($type == null) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', ['type' => $type]);
    }
}