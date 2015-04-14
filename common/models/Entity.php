<?php

namespace common\models;

use common\behaviors\ImageUploadBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is a base model class for entities.
 *
 * @property string $lang
 * @property string $image_url
 * @property string $image_base_url
 */
class Entity extends ActiveRecord
{
    /**
     * @var array
     */
    public $image;

    /**
     * @inheritdoc
     */
    public function formName()
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_url'], 'string', 'max' => 255],
            [['image_base_url'], 'string', 'max' => 45],
            [['image'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => ImageUploadBehavior::className(),
                'attribute' => 'image',
                'pathAttribute' => 'image_url',
                'baseUrlAttribute' => 'image_base_url',
                'nameAttribute' => 'no_one',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->lang = Yii::$app->language;
            return true;
        } else {
            return false;
        }
    }


    /**
     * Get full image path including base url.
     * @return null|string
     */
    public function getImagePath() {
        return is_null($this->image) ? null : $this->image_base_url . '/' . $this->image_url;
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return parent::find()->where(['lang' => Yii::$app->language]);
    }
}