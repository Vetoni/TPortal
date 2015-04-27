<?php

namespace frontend\controllers;

use common\models\TourType;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class TourSubTypeController
 * @package frontend\controllers
 */
class TourSubTypeController extends Controller
{
    /**
     * @param $pid
     * @param $tid
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($pid, $tid)
    {
        $type = TourType::findOne($tid);

        if ($type == null) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', ['type' => $type]);
    }

    /**
     * @param $pid
     * @return string
     */
    public function actionList($pid)
    {
        return Json::encode(TourType::getList($pid));
    }
}