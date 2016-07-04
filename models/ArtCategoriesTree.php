<?php

namespace mosesfender\articles\models;

use Yii;

/**
 * This is the model class for table "{{%art_categories_tree}}".
 *
 * @property integer $cat_parent_id
 * @property integer $cat_child_id
 */
class ArtCategoriesTree extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%art_categories_tree}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_parent_id', 'cat_child_id'], 'required'],
            [['cat_parent_id', 'cat_child_id'], 'integer'],
            [['cat_parent_id', 'cat_child_id'], 'unique', 'targetAttribute' => ['cat_parent_id', 'cat_child_id'], 'message' => 'The combination of Cat Parent ID and Cat Child ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_parent_id' => 'Cat Parent ID',
            'cat_child_id' => 'Cat Child ID',
        ];
    }
}
