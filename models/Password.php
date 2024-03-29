<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class Password extends Model
{
    public $username;
    public $fio;
    public $password;
    public $password_repeat;
   

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			['password', 'required', 'message' => 'Пароль не может быть пустым'],
            ['password', 'string', 'min' => 6, 'tooShort'=>'Пароль не может быть меньше 6 символов'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароль не совпадает'],
        ];
    }

    public function attributeLabels()
    {
        return array(

            'password' => 'Введите Пароль',
            'password_repeat' => 'Повторите пароль',

        );
    }
}
