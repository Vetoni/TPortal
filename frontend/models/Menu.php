<?php

namespace frontend\models;

use yii\db\ActiveRecord;


/**
 * Class Menu
 * @package frontend\models
 */
class Menu extends ActiveRecord {

    /**
     * Get children nodes for current menu item
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getChildren() {
        return $this->hasMany(self::className(), ['parent_id' => 'id'])->all();
    }

    /**
     * Gets parent item for current node
     * @return \yii\db\ActiveQuery
     */
    public function getParent() {
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }

    /**
     * Get all menu items
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getNodes() {
        return self::find()->all();
    }

    /**
     * Get only top level menu items
     * @return static[]
     */
    public static function getTopLevelNodes() {
        return self::getNodesByParentId(NULL);
    }

    /**
     * Get menu items by parent id.
     * @param $parentId
     * @return static[]
     */
    public static function getNodesByParentId($parentId) {
        return self::findAll(['parent_id' => $parentId]);
    }
}