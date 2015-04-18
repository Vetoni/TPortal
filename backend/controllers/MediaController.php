<?php

namespace backend\controllers;

use Intervention\Image\ImageManagerStatic;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * MediaController implements operations for uploading and deleting media files.
 * @package backend\controllers
 */
class MediaController extends Controller
{
    /**
     * Image width
     */
    const IMG_WIDTH = 300;

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
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
                'deleteRoute' => 'upload-delete',
                'on afterSave' => function($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    /** Crops image to fixed width */
                    $img = ImageManagerStatic::make($file->read())->widen(self::IMG_WIDTH);
                    $file->put($img->encode());
                }
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