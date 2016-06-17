<?php

namespace mosesfender\articles\models;

/**
 * This is the ActiveQuery class for [[ArtCategories]].
 *
 * @see ArtCategories
 */
class ArtCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArtCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ArtCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
