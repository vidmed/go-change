<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "rate".
 *
 * @property integer $id
 * @property integer $from_currency_id
 * @property integer $to_currency_id
 * @property double $from_amount
 * @property double $to_amount
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Currency $toCurrency
 * @property Currency $fromCurrency
 */
class Rate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rate';
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
            [['from_currency_id', 'to_currency_id', 'from_amount', 'to_amount'], 'required'],
            [['from_currency_id', 'to_currency_id', 'created_at', 'updated_at'], 'integer'],
            [['from_amount', 'to_amount'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_currency_id' => 'Валюта (из)',
            'to_currency_id' => 'Валюта (в)',
            'from_amount' => 'Отдаете',
            'to_amount' => 'Получаете',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'to_currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'from_currency_id']);
    }
}
