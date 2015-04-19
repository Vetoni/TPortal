<?php
namespace frontend\controllers;

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

    public function beforeAction($action)
    {
        if ($action->id == 'error')
            $this->layout = 'base';

        return parent::beforeAction($action);
    }

    /**
     * Index action method
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
