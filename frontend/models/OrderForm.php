<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Class OrderForm
 * @package frontend\models
 */
class OrderForm extends Model
{
    /**
     * @var
     */
    public $orderNo;

    /**
     * @var
     */
    public $tourId;

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
    public $address;

    /**
     * @var
     */
    public $email;

    /**
     * @var
     */
    public $phone;

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
            [['name', 'surname', 'address', 'email', 'phone'], 'required'],
            [['name', 'surname', 'email', 'phone'], 'string', 'max' => 255],
            [['orderNo', 'tourId', 'emailSent'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'orderNo' => Yii::t('app', 'Order no.'),
            'tourId' => Yii::t('app', 'Tour id'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
        ];
    }
}