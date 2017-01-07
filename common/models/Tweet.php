<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tweet".
 *
 * @property integer $id
 * @property string $content
 * @property integer $account_id1
 *
 * @property Account $accountId1
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
            [['content', 'account_id1'], 'required'],
            [['content'], 'string'],
            [['account_id1'], 'integer'],
            [['account_id1'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account_id1' => 'id']],
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
            'account_id1' => 'Account Id1',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountId1()
    {
        return $this->hasOne(Account::className(), ['id' => 'account_id1']);
    }
}