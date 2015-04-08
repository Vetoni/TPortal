<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;


/**
 * Class SiteController
 * @package backend\controllers
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
