<?php

namespace common\components;

use Yii;

/**
 * Class EmailHelper
 * @package common\components
 */
class EmailHelper{

    /**
     * @param $template
     * @param $title
     * @param $model
     * @param $to
     */
    public static function send($template, $title, $model, $to) {
        //try {
            Yii::$app->mailer->compose($template, [
                'model' => $model
            ])->setFrom(Yii::$app->params["adminEmail"])
              ->setTo($to)
              ->setSubject("TPortal: $title")
              ->send();
        //}
        //catch (\Swift_SwiftException $e) {
         //   Yii::error($e->getMessage());
       // }
    }
}