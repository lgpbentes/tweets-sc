<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $username
 * @property string $user_json
 *
 * @property Tweet[] $tweets
 * @property UserEvAccount[] $userEvAccounts
 * @property User[] $users
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['user_json'], 'string'],
            [['username'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'user_json' => 'User Json',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTweets()
    {
        return $this->hasMany(Tweet::className(), ['account_id1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserEvAccounts()
    {
        return $this->hasMany(UserEvAccount::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_ev_account', ['account_id' => 'id']);
    }
}
