<?php

namespace backend\controllers;

use Yii;
use common\behaviors\BackUrlBehavior;
use common\models\TourType;
use backend\models\TourTypeSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * TourTypeController implements the CRUD actions for TourType model.
 */
class TourTypeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            [
                'class' => BackUrlBehavior::className(),
            ],
        ];
    }

    /**
     * Lists all TourType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TourTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'topLevel' => $this->getTopLevel(),
        ]);
    }

    /**
     * Creates a new TourType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TourType();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'topLevel' => $this->getTopLevel(),
            ]);
        }
    }

    /**
     * Updates an existing TourType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'topLevel' => $this->getTopLevel(),
            ]);
        }
    }

    /**
     * Deletes an existing TourType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TourType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TourType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TourType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Gets the array with the type id as a key and type name as a value.
     * @return array
     */
    protected function getTopLevel() {
        return ArrayHelper::map(TourType::getTopLevelOnly(), 'tid', 'name');
    }
}
