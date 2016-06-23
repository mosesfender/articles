<?php

namespace mosesfender\articles\models;

use Yii;

/**
 * This is the model class for table "{{%art_categories}}".
 *
 * @property integer $id
 * @property string $cat_title
 * @property string $cat_description
 * @property integer $status
 * @property string $created_at
 * @property string $update_at
 */
class ArtCategories extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%art_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cat_title'], 'required'],
            [['cat_description'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['cat_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('articles', 'ID'),
            'cat_title' => Yii::t('articles', 'Cat Title'),
            'cat_description' => Yii::t('articles', 'Cat Description'),
            'status' => Yii::t('articles', 'Status'),
            'created_at' => Yii::t('articles', 'Created At'),
            'update_at' => Yii::t('articles', 'Update At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ArtCategoriesQuery the active query used by this AR class.
     */
    public static function find() {
        return new ArtCategoriesQuery(get_called_class());
    }

    public function beforeSave($insert) {
        $insert ? $this->created_at = date("YmdHis", time()) : $this->update_at = date("YmdHis", time());
        return parent::beforeSave($insert);
    }

    public function getArticles() {
        return $this->hasMany(Articles::className(), ["cat_id" => "id"]);
    }

}
