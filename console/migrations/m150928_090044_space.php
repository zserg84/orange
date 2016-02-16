<?php

use yii\db\Migration;

class m150928_090044_space extends Migration
{
    public function up()
    {

        $this->createTable('space', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
            'level_id' => $this->integer()->notNull(),
            'area' => $this->float(),
        ]);
        $this->addForeignKey('fk_space_level_id__level_id', 'space', 'level_id', 'level', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('space');
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
