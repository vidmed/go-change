<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "currency".
 *
 * @property integer $id
 * @property string  $name
 * @property integer $billing_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Billing $billing
 * @property Rate[]  $rates
 * @property Rate[]  $rates0
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'billing_id'], 'required'],
            [['billing_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'name'       => 'Название валюты',
            'billing_id' => 'Платежная система',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBilling()
    {
        return $this->hasOne(Billing::className(), ['id' => 'billing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRates()
    {
        return $this->hasMany(Rate::className(), ['to_currency_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRates0()
    {
        return $this->hasMany(Rate::className(), ['from_currency_id' => 'id']);
    }

    /**
     * Возвращает ассоциативный массив всех валют
     * id => name
     *
     * @return array
     */
    public static function getAssocCurrencies()
    {
        return self::find()->select(['name', 'id'])->orderBy('id')->indexBy('id')->column();
    }

    /**
     * @param $billing_id
     *
     * @return array|null
     */
    public static function getCurrenciesByBilling($billing_id)
    {
        return !empty($billing_id) ?
            self::find()->select(['name', 'id'])->where(['billing_id' => $billing_id])->asArray()->all() :
            null;
    }
}
