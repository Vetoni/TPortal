<?php
namespace frontend\controllers;

use common\models\ContentPage;
use common\models\NewsItem;
use common\models\Settings;
use Yii;
use yii\web\Controller;

/**
 * Class SiteController
 * @package frontend\controllers
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if ($action->id == 'error')
            $this->layout = 'one-column';

        return parent::beforeAction($action);
    }

    /**
     * Index action method
     * @return string
     */
    public function actionIndex()
    {
        $settings = Settings::findOne(['id' => 1]);
        return $this->render('index', [
            'news' => NewsItem::getTop()->all(),
            'homePage' => ContentPage::findOne($settings->homepage),
        ]);
    }
}
