<?php

use yii\db\Migration;

class m150928_093626_gallery extends Migration
{
    public function up()
    {
        $this->createTable('image', [
            'id' => $this->primaryKey(),
            'ext' => $this->string(4),
            'comment' => $this->string(),
            'created_at' => $this->integer(),
            'sort' => $this->integer(),
        ]);

    }

    public function down()
    {
        $this->dropTable('image');
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
