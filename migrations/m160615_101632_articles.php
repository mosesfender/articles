<?php

use yii\db\Migration;

class m160615_101632_articles extends Migration {

    const TAB_ARTICLES = "{{%articles}}";
    const TAB_ARTICLES_TREE = "{{%articles_tree}}";

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        if ($this->db->schema->getTableSchema(self::TAB_ARTICLES, true) === null) {
            $this->createTable(self::TAB_ARTICLES, [
                "id" => $this->primaryKey(),
                "cat_id" => $this->integer()->notNull(),
                "art_title" => $this->string()->notNull(),
                "art_subtitle" => $this->string(),
                "art_text" => $this->text(),
                "created_at" => $this->dateTime()->defaultValue(0),
                "update_at" => $this->dateTime()->defaultValue(0),
                "status" => $this->integer()->notNull()->defaultValue(0),
            ]);
            $this->createIndex("i_status", self::TAB_ARTICLES, "status");
        }
        if ($this->db->schema->getTableSchema(self::TAB_ARTICLES_TREE, true) === null) {
            $this->createTable(self::TAB_ARTICLES_TREE, [
                "art_id" => $this->integer()->notNull()->defaultValue(0),
                "cat_id" => $this->integer()->notNull()->defaultValue(0),
                "status" => $this->integer()->notNull()->defaultValue(0),
                "sort" => $this->integer()->notNull()->defaultValue(0)
            ]);
            $this->createIndex("art_tree", self::TAB_ARTICLES_TREE, ["art_id", "cat_id"], true);
            $this->createIndex("art_id", self::TAB_ARTICLES_TREE, "art_id");
            $this->createIndex("cat_id", self::TAB_ARTICLES_TREE, "cat_id");
            $this->createIndex("status", self::TAB_ARTICLES_TREE, ["status"]);
        }
    }

    public function down() {
        if ($this->db->schema->getTableSchema(self::TAB_ARTICLES, true) !== null) {
            $this->dropTable(self::TAB_ARTICLES);
        }
        if ($this->db->schema->getTableSchema(self::TAB_ARTICLES_TREE, true) !== null) {
            $this->dropTable(self::TAB_ARTICLES_TREE);
        }
    }

}
