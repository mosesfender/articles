<?php

use yii\db\Migration;

class m160615_101632_articles extends Migration {

    const TAB_ARTICLES = "{{%articles}}";

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        if ($this->db->schema->getTableSchema(self::TAB_ARTICLES, true) === null) {
            $this->createTable(self::TAB_ARTICLES, [
                "id" => $this->primaryKey(),
                "cat_id" => $this->integer()->notNull(),
                "art_text" => $this->text(),
                "status" => $this->integer()->notNull(),
            ]);
        }
    }

    public function down() {
        if ($this->db->schema->getTableSchema(self::TAB_ARTICLES, true) !== null) {
            $this->dropTable(self::TAB_ARTICLES);
        }
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
