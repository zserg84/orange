<?php

use yii\db\Migration;

class m160222_082924_space_tenant extends Migration
{
    public function up()
    {
        $this->dropForeignKey('fk_tenant_space_id__space_id', 'tenant');
        $this->dropColumn('tenant', 'space_id');

        $this->addColumn('space', 'tenant_id', $this->integer());
        $this->addForeignKey('fk_space_tenant_id__tenant_id', 'space', 'tenant_id', 'tenant', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        echo "m160222_082924_space_tenant cannot be reverted.\n";

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
