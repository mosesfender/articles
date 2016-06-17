<?php
namespace mosesfender\articles\models;
require_once 'MFActiveRecord.php';

use Yii;
use mosesfender\articles\models\ArtCategories;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $art_title
 * @property string $art_subtitle
 * @property string $art_text
 * @property string $created_at
 * @property string $update_at
 * @property integer $status
 * @property boolean $enabled
 * @property \mosesfender\articles\models\ArtCategories $category
 */
class Articles extends \mosesfender\models\MFActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%articles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cat_id', 'art_title', 'status'], 'required'],
            [['cat_id', 'status'], 'integer'],
            [['art_text'], 'string'],
            [['created_at', 'update_at'], 'safe'],
            [['art_title', 'art_subtitle'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('articles', 'ID'),
            'cat_id' => Yii::t('articles', 'Cat ID'),
            'art_title' => Yii::t('articles', 'Art Title'),
            'art_subtitle' => Yii::t('articles', 'Art Subtitle'),
            'art_text' => Yii::t('articles', 'Art Text'),
            'created_at' => Yii::t('articles', 'Created At'),
            'update_at' => Yii::t('articles', 'Update At'),
            'status' => Yii::t('articles', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return ArticlesQuery the active query used by this AR class.
     */
    public static function find() {
        return new ArticlesQuery(get_called_class());
    }

    public function beforeSave($insert) {
        $insert ? $this->created_at = date("YmdHis", time()) : $this->update_at = date("YmdHis", time());
        return parent::beforeSave($insert);
    }

    public function getCategory() {
        return $this->hasOne(ArtCategories::className(), ["id" => "cat_id"]);
    }

 }
