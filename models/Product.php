<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $img
 * @property string $price
 * @property resource $description
 */
class Product extends \yii\db\ActiveRecord
{
	public $imgFile; // для загрузки файла
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 20],
            [['img'], 'string', 'max' => 500],
			[['imgFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
		
			[['name', 'price'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'code' => 'Артикул',
            'img' => 'Фото',
            'price' => 'Цена, руб',
            'description' => 'Описание',
			'imgFile' => 'Фото',
        ];
    }
}
