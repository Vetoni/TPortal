<?php

namespace frontend\controllers;

use common\models\NewsItem;
use yii\web\Controller;

/**
 * Class NewsController
 * @package frontend\controllers
 */
class NewsController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $news = NewsItem::find()
            ->orderBy('created')
            ->all();

        return $this->render('index', ['news' => $news]);
    }

    /**
     * View action method
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $model = NewsItem::findOne($id);
        return $this->render('view', ['model' => $model]);
    }
}