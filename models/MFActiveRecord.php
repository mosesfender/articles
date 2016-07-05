<?php

namespace mosesfender\articles\models;

use yii\db\ActiveRecord;

/**
 * @property integer $enabled Status Enabled
 * @property integer $published Status Published
 * @property integer $deleted Status Deleted
 */
class MFActiveRecord extends ActiveRecord {

    const FLAG_ENABLED = 1;
    const FLAG_PUBLISHED = 2;
    const FLAG_DELETED = 4;

    public function withFlags($flag = 0) {
        $this->getDbCriteria()->mergeWith(array(
            'order' => 'flags & :flag',
            'params' => array(':flag' => $flag),
        ));
        return $this;
    }

    public function getEnabled() {
        return (boolean) self::FLAG_ENABLED & $this->status;
    }

    public function getPublished() {
        return (boolean) self::FLAG_PUBLISHED & $this->status;
    }

    public function getDeleted() {
        return (boolean) self::FLAG_DELETED & $this->status;
    }

    
}
