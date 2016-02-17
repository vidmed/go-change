<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "billing".
 *
 * @property integer    $id
 * @property string     $name
 * @property integer    $created_at
 * @property integer    $updated_at
 *
 * @property Currency[] $currencies
 */
class Billing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'billing';
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
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
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
            'name'       => 'Название платежной системы',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencies()
    {
        return $this->hasMany(Currency::className(), ['billing_id' => 'id']);
    }

    /**
     * Возвращает ассоциативный массив всех платежных систем
     * id => name
     *
     * @return array
     */
    public static function getAssocBillings()
    {
        return self::find()->select(['name', 'id'])->orderBy('id')->indexBy('id')->column();
    }
}
