<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_currency".
 *
 * @property int $id
 * @property int $user_id
 * @property int $currency_id
 */
class UserCurrency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'currency_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'currency_id' => 'Currency ID',
        ];
    }
}
