<?php

use yii\db\Migration;

class m160211_064050_advertising extends Migration
{
    public function up()
    {
        $this->createTable('advertising', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image_id' => $this->integer()
        ]);
        $this->addForeignKey('fk_advertising_image_id__image_id', 'advertising', 'image_id', 'image', 'id', 'SET NULL', 'CASCADE');

        $this->createTable('orange_property', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('orange_property');
        $this->dropTable('advertising');
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
