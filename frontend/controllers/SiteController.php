<?php

namespace frontend\controllers;

use Yii;
use common\components\EmailHelper;
use common\models\ContentPage;
use common\models\NewsItem;
use common\models\Settings;
use frontend\models\FeedbackForm;
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
        $settings = Settings::findOne(['id' => 'homepage']);
        return $this->render('index', [
            'news' => NewsItem::getTop()->all(),
            'page' => ContentPage::findOne($settings->value),
        ]);
    }

    /**
     * Index action method
     * @return string
     */
    public function actionContact()
    {
        $settings = Settings::findOne(['id' => 'contactpage']);
        return $this->render('contact', [
            'page' => ContentPage::findOne($settings->value),
        ]);
    }

    /**
     * @return string
     */
    public function  actionServices()
    {
        $settings = Settings::findOne(['id' => 'servicespage']);
        return $this->render('services', [
            'page' => ContentPage::findOne($settings->value),
        ]);
    }

    /**
     * @return string
     */
    public function actionFaq()
    {
        $settings = Settings::findOne(['id' => 'faqpage']);
        return $this->render('faq', [
            'page' => ContentPage::findOne($settings->value),
        ]);
    }

    /**
     * @return string
     */
    public function actionFeedback()
    {
        $settings = Settings::findOne(['id' => 'feedbackpage']);

        $model = new FeedbackForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            EmailHelper::send('feedback', Yii::t('app', 'Feedback'), $model,
                Yii::$app->params["adminEmail"]);

            $model->emailSent = true;
        }

        return $this->render('feedback', [
            'page' => ContentPage::findOne($settings->value),
            'model' => $model,
        ]);
    }
}
