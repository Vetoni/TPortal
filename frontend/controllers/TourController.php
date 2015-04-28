<?php

namespace frontend\controllers;

use common\components\EmailHelper;
use Yii;
use common\models\Tour;
use frontend\models\OrderForm;
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

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionOrder($id)
    {
        $tour = Tour::findOne($id);

        if ($tour == null) {
            throw new NotFoundHttpException();
        }

        $model = new OrderForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->emailSent = true;
            $model->orderNo = $this->generateRandomString();
            $model->tourId = $id;

            EmailHelper::send('order', Yii::t('app', 'Tour order request'), $model,
                Yii::$app->params["adminEmail"]);

            EmailHelper::send('order', Yii::t('app', 'Tour order request'), $model,
                $model->email);
        }

        return $this->render('order', ['model' => $model]);
    }

    /**
     * @param int $length
     * @return string
     */
    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
