<?php

namespace frontend\models;

use yii\db\ActiveRecord;


/**
 * Class TopMenu
 * @package frontend\models
 */
class TopMenu extends ActiveRecord {

    public function getChildren() {
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }

    public function getParent() {
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }

    public static function getAll() {
        return self::find()->all();
    }

    public static function getTopOnly() {
        return self::getByParent(NULL);
    }

    public static function getByParent($parentId) {
        return self::findAll(['parent_id' => $parentId]);
    }
}