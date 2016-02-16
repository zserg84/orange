<?php

use yii\db\Migration;

class m150928_085918_level extends Migration
{
    public function up()
    {
        $this->createTable('level', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
        ]);
        $this->createIndex('level_name', 'level', 'name', 1);

        for($i=0; $i<=4;$i++){
            $this->insert('level', [
                'id' => $i+1,
                'name' => $i
            ]);
        }
    }

    public function down()
    {
        $this->dropTable('level');
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
