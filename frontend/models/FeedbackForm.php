<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Class FeedbackForm
 * @package frontend\models
 */
class FeedbackForm extends Model
{
    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $surname;

    /**
     * @var
     */
    public $email;

    /**
     * @var
     */
    public $message;

    /**
     * @var
     */
    public $emailSent;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email', 'message'], 'required'],
            [['name', 'surname', 'email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['message'], 'string', 'max' => 2048],
            [['emailSent'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'email' => Yii::t('app', 'Email'),
            'message' => Yii::t('app', 'Message'),
        ];
    }
}