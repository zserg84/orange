<?php

use yii\db\Migration;

class m160211_095631_main_gallery extends Migration
{
    public function up()
    {
        $this->createTable('main_gallery',[
            'id' => $this->primaryKey(),
            'image_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('fk_main_gallery_image_id__image_id', 'main_gallery', 'image_id', 'image', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('main_gallery');
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
