<?php

Yii::setAlias('frontendUrl', 'http://tportal.com');
Yii::setAlias('backendUrl', 'http://admin.tportal.com');
Yii::setAlias('storageUrl', '@frontendUrl/storage/files');

Yii::setAlias('@base', realpath(__DIR__.'/../../'));
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', realpath(__DIR__.'/../../frontend'));
Yii::setAlias('backend', realpath(__DIR__.'/../../backend'));
Yii::setAlias('console', realpath(__DIR__.'/../../console'));
Yii::setAlias('storage', '@frontend/web/storage');
Yii::setAlias('vendor', realpath(__DIR__.'/../../vendor'));
Yii::setAlias('admin-lte', '@vendor/almasaeed2010/adminlte/dist');
Yii::setAlias('font-awesome', '@vendor/fortawesome/font-awesome');
Yii::setAlias('jquery-slimscroll', '@vendor/diiimonn/yii2-asset-slimscroll');
