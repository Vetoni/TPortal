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
     * Index action method
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
