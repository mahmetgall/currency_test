<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "Currency".
 *
 * @property int $id
 * @property string $name
 * @property int $num_code
 * @property string $char_code
 * @property int $nominal
 * @property string $value
 * @property int $created_at
 * @property int $updated_at
 */
class Currency extends \yii\db\ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
		TimestampBehavior::className(),
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'Currency';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
		[['num_code', 'nominal'], 'integer'],
		[['value'], 'number'],
		[['name'], 'string', 'max' => 255],
		[['char_code'], 'string', 'max' => 10],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
		'id' => 'ID',
		'name' => 'Name',
		'num_code' => 'Num Code',
		'char_code' => 'Char Code',
		'nominal' => 'Nominal',
		'value' => 'Value',
		'created_at' => 'Created At',
		'updated_at' => 'Updated At',
		];
	}

	public function getUserCurrent() {

		return $this->hasOne(StreamsFormations::className(), ['stream_id' => 'id']);
	}

}
