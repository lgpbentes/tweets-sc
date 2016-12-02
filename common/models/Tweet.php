<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tweet".
 *
 * @property integer $id
 * @property string $content
 * @property integer $qtTrue
 * @property integer $qtFalse
 *
 * @property UserEvTweet[] $userEvTweets
 * @property User[] $users
 */
class Tweet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tweet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['qtTrue', 'qtFalse'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'qtTrue' => 'Qt True',
            'qtFalse' => 'Qt False',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserEvTweets()
    {
        return $this->hasMany(UserEvTweet::className(), ['tweet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_ev_tweet', ['tweet_id' => 'id']);
    }
}
