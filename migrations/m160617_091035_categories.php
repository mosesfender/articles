<?php

use yii\db\Migration;

class m160617_091035_categories extends Migration {

    const TAB_CATEGORIES = "{{%art_categories}}";

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
        }
    }

    public function down() {
        if ($this->db->schema->getTableSchema(self::TAB_ARTICLES, true) !== null) {
            $this->dropTable(self::TAB_ARTICLES);
        }
        return false;
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
