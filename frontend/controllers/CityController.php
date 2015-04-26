<?php

namespace frontend\controllers;

use common\models\City;
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

        return Json::encode(City::getList($rid));
    }
}