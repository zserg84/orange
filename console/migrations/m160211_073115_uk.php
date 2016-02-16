<?php

use yii\db\Migration;

class m160211_073115_uk extends Migration
{
    public function up()
    {
        $this->createTable('uk', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'properties' => $this->text(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'address' => $this->string()
        ]);

        $this->createTable('uk_services', [
            'id' => $this->primaryKey(),
            'uk_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()
        ]);
        $this->addForeignKey('fk_uk_services_uk_id__uk_id', 'uk_services', 'uk_id', 'uk', 'id', 'CASCADE', 'CASCADE');

        $this->createTable('uk_objects', [
            'id' => $this->primaryKey(),
            'uk_id' => $this->integer()->notNull(),
            'address' => $this->string()->notNull(),
            'image_id' => $this->integer()
        ]);
        $this->addForeignKey('fk_uk_objects_uk_id__uk_id', 'uk_objects', 'uk_id', 'uk', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_uk_objects_image_id__image_id', 'uk_objects', 'image_id', 'image', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('uk_objects');
        $this->dropTable('uk_services');
        $this->dropTable('uk');
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
