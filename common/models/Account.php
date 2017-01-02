<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $username
 * @property string $bio
 * @property string $photo_profile
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
            [['username'], 'string', 'max' => 45],
            [['bio', 'photo_profile'], 'string', 'max' => 255],
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
            'bio' => 'Bio',
            'photo_profile' => 'Photo Profile',
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
