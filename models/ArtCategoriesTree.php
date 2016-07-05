<?php

namespace mosesfender\articles\models;

use Yii;
use \mosesfender\articles\models\MFActiveRecord;

/**
 * @todo Вложенность категорий неограничена. Каждая категория может находиться в 
 * одной или нескольких категориях. В каждой родительской категории категория должна 
 * иметь свой порядок сортировки и статус.
 * 
 * @todo Статьи могут быть вложены в различные категории, и так же иметь собственный 
 * статус и порядок сортировки в каждой категории.
 */

/**
 * This is the model class for table "{{%art_categories_tree}}".
 *
 * @property integer $cat_parent_id
 * @property integer $cat_child_id
 * @property integer $status
 * @property integer $sort
 */
class ArtCategoriesTree extends MFActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%art_categories_tree}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cat_parent_id', 'cat_child_id'], 'required'],
            [['cat_parent_id', 'cat_child_id'], 'integer'],
            [['cat_parent_id', 'cat_child_id'], 'unique', 'targetAttribute' => ['cat_parent_id', 'cat_child_id'], 'message' => 'The combination of Cat Parent ID and Cat Child ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'cat_parent_id' => 'Cat Parent ID',
            'cat_child_id' => 'Cat Child ID',
        ];
    }

    public static function getCategoryChildrens($id, $order = "sort ASC") {
        $rows = (new \yii\db\Query)
                ->select(["act.*", "ac.*"])
                ->from(ArtCategories::tableName() . " ac")
                ->leftJoin(self::tableName() . " act", "act.cat_parent_id = ac.id")
                ->where(["act.cat_child_id" => $id])
                ->orderBy($order)
                ->createCommand()->getRawSql();
                //->all();
        return $rows;
    }

}
