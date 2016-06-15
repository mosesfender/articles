<?php

namespace mosesfender\articles\models;

use Yii;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $art_text
 * @property integer $status
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%articles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'status'], 'required'],
            [['cat_id', 'status'], 'integer'],
            [['art_text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('articles', 'ID'),
            'cat_id' => Yii::t('articles', 'Cat ID'),
            'art_text' => Yii::t('articles', 'Art Text'),
            'status' => Yii::t('articles', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return ArticlesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticlesQuery(get_called_class());
    }
}
