<?php

namespace frontend\controllers;
use common\models\TourType;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;

/**
 * Class TourSubTypeController
 * @package frontend\controllers
 */
class TourSubTypeController extends Controller
{
    /**
     * @param $type
     * @param $id
     * @return mixed
     */
    public function actionIndex($type, $id)
    {
        return $this->render('index');
    }

    /**
     * @param $pid
     * @return string
     */
    public function actionList($pid) {

        $subTypes = strlen($pid) == 0 ?
            TourType::getSubTypes()->all() :
            TourType::findOne($pid)->children;

        return Json::encode(ArrayHelper::map($subTypes, 'tid', 'name'));
    }
}