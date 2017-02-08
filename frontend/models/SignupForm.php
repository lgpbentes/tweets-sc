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
            ['username', 'required', 'message' => 'Usuário não pode estar em branco'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este username já está sendo usado'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'Endereço de email não pode estar em branco'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este endereço de email já está sendo usado'],

            [['foto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],

            ['password', 'required', 'message' => 'Senha não pode estar em branco'],
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
        if ($this->foto){
            $extensao = $this->foto->extension;
            if ($this->validate()) {
                $this->foto->saveAs('users/' . $nome . '.' . $extensao);
                $this->foto="users/".$nome.'.'.$extensao;

                return true;
            } else {
                return false;
            }
        }
        return true;
    }

}
