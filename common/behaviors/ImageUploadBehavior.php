<?php

namespace common\behaviors;

use trntv\filekit\behaviors\UploadBehavior;
use yii\helpers\Url;

/**
 * Class ImageUploadBehavior
 * @package common\behaviors
 */
class ImageUploadBehavior extends UploadBehavior
{
    /**
     * This method is overridden to fix trntv\filekit uploader behavior
     * because delete_url is not populated in the result markup of upload widget.
     * @param $file
     * @return mixed
     */
    protected function enrichFileData($file)
    {
        $file = parent::enrichFileData($file);
        $file['delete_url'] = Url::to(['media/upload-delete', 'path' => $file['path']]);
        return $file;
    }

    /**
     * This method is overridden to fix trntv\filekit uploader behavior
     * during deleting files when path attribute is null for the behavior owner.
     * @return bool|void
     */
    protected function deleteFiles()
    {
        if (!is_null($this->deletePaths)) {
            parent::deleteFiles();
        }
    }
}