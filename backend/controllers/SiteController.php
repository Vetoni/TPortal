<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;


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
