<?php

namespace mosesfender\articles\models;

use Yii;

/**
 * This is the model class for table "articles_tree".
 *
 * @property integer $art_id
 * @property integer $cat_id
 */
class ArticlesTree extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_tree';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['art_id', 'cat_id'], 'required'],
            [['art_id', 'cat_id'], 'integer'],
            [['art_id', 'cat_id'], 'unique', 'targetAttribute' => ['art_id', 'cat_id'], 'message' => 'The combination of Art ID and Cat ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'art_id' => 'Art ID',
            'cat_id' => 'Cat ID',
        ];
    }
}
