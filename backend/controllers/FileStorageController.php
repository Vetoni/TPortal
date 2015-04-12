<?php

namespace backend\controllers;

use yii\filters\VerbFilter;
use yii\web\Controller;

class FileStorageController extends Controller
{
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
                'responseUrlParam'=> 'filelink',
                'multiple' => false,
                'disableCsrf' => true
            ],
        ];
    }
}