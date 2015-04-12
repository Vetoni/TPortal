<?php

namespace backend\controllers;

use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * MediaController implements operations for uploading and deleting media files.
 * @package backend\controllers
 */
class MediaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'upload-delete' => ['delete']
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'trntv\filekit\actions\UploadAction',
                'deleteRoute' => 'upload-delete'
            ],
            'upload-delete' => [
                'class' => 'trntv\filekit\actions\DeleteAction'
            ],
            'upload-imperavi' => [
                'class' => 'trntv\filekit\actions\UploadAction',
                'fileparam' => 'file',
                'responseUrlParam' => 'filelink',
                'multiple' => false,
                'disableCsrf' => true
            ],
        ];
    }
}