<?php

use yii\db\Migration;

class m160617_091035_categories extends Migration {

    const TAB_CATEGORIES = "{{%art_categories}}";
    const TAB_CATEGORIES_TREE = "{{%art_categories_tree}}";

    public function up() {
        if ($this->db->schema->getTableSchema(self::TAB_CATEGORIES, true) === null) {
            $this->createTable(self::TAB_CATEGORIES, [
                "id" => $this->primaryKey(),
                "cat_title" => $this->string()->notNull(),
                "cat_description" => $this->text(),
                "status" => $this->integer()->defaultValue(0),
                "created_at" => $this->dateTime(),
                "update_at" => $this->dateTime()
            ]);
            $this->createIndex("i_status", self::TAB_CATEGORIES, "status");
        }
        
        if ($this->db->schema->getTableSchema(self::TAB_CATEGORIES_TREE, true) === null) {
            $this->createTable(self::TAB_CATEGORIES_TREE, [
                "cat_parent_id" => $this->integer()->notNull()->defaultValue(0),
                "cat_child_id" => $this->integer()->notNull()->defaultValue(0),
                "status" => $this->integer()->notNull()->defaultValue(0),
                "sort" => $this->integer()->notNull()->defaultValue(0)
            ]);

            $this->createIndex("cat_tree", self::TAB_CATEGORIES_TREE, ["cat_parent_id", "cat_child_id"], TRUE);
            $this->createIndex("cat_parent", self::TAB_CATEGORIES_TREE, ["cat_parent_id"]);
            $this->createIndex("cat_child", self::TAB_CATEGORIES_TREE, ["cat_child_id"]);
            $this->createIndex("status", self::TAB_CATEGORIES_TREE, ["status"]);
        }
    }

    public function down() {
        if ($this->db->schema->getTableSchema(self::TAB_CATEGORIES, true) !== null) {
            $this->dropTable(self::TAB_CATEGORIES);
        }
        if ($this->db->schema->getTableSchema(self::TAB_CATEGORIES_TREE, true) !== null) {
            $this->dropTable(self::TAB_CATEGORIES_TREE);
        }
        return false;
    }

}
