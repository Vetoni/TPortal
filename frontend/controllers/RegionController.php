<?php

namespace frontend\controllers;

use common\models\Region;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class RegionController
 * @package frontend\controllers
 */
class RegionController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $regions = Region::find()->all();
        return $this->render('index', ['regions' => $regions]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $region = Region::findOne($id);

        if ($region == null) {
            throw new NotFoundHttpException();
        }

        return $this->render('view', [
            'region' => $region,
        ]);
    }
}