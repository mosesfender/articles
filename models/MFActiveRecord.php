<?php

namespace mosesfender\models;

use yii\db\ActiveRecord;

class MFActiveRecord extends ActiveRecord {

    const FLAG_ENABLED = 1;

    public function withFlags($flag = 0) {
        $this->getDbCriteria()->mergeWith(array(
            'order' => 'flags & :flag',
            'params' => array(':flag' => $flag),
        ));
        return $this;
    }

    public function getEnabled() {
        return (boolean) 1 & $this->status;
    }

}
