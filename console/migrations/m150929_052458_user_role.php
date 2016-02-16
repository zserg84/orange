<?php

use yii\db\Migration;

class m150929_052458_user_role extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'role', $this->string(64)->notNull());
    }

    public function down()
    {
        $this->dropColumn('user', 'role');
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
