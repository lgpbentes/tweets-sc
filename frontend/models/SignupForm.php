<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii\helpers\FileHelper;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $foto;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            [['foto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->foto = $this->foto;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }

    private $nome, $extensao;
    public function upload()
    {
        $nome= "user_".$this->username;
        $extensao = $this->foto->extension;
        if ($this->validate()) {
            $this->foto->saveAs('users/' . $nome . '.' . $extensao);
            $this->foto="users/".$nome.'.'.$extensao;

            return true;
        } else {
            return false;
        }
    }

}
