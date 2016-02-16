<?php

use yii\db\Migration;

class m150929_055740_level_alter extends Migration
{
    public function up()
    {
        $this->addColumn('level', 'image_id', $this->integer());
        $this->addForeignKey('fk_level_image_id__image_id', 'level', 'image_id', 'image', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropColumn('level', 'image_id');
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
