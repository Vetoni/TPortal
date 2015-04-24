<?php

namespace frontend\controllers;

use common\models\Region;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;

/**
 * Class CityController
 * @package frontend\controllers
 */
class CityController extends Controller
{
    /**
     * @param $rid
     * @return string
     */
    public function actionList($rid) {

        $cities = strlen($rid) == 0 ?
            City::find()->all() :
            Region::findOne($rid)->cities;

        return Json::encode(ArrayHelper::map($cities, 'cid', 'name'));
    }
}