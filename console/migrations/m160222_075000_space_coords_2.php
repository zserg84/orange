<?php

use yii\db\Migration;

class m160222_075000_space_coords_2 extends Migration
{
    public function up()
    {
        $this->addColumn('space', 'x5', $this->float(6));
        $this->addColumn('space', 'y5', $this->float(6));
        $this->addColumn('space', 'x6', $this->float(6));
        $this->addColumn('space', 'y6', $this->float(6));
        $this->addColumn('space', 'x7', $this->float(6));
        $this->addColumn('space', 'y7', $this->float(6));
        $this->addColumn('space', 'x8', $this->float(6));
        $this->addColumn('space', 'y8', $this->float(6));
    }

    public function down()
    {
        $this->dropColumn('space', 'x5');
        $this->dropColumn('space', 'y5');
        $this->dropColumn('space', 'x6');
        $this->dropColumn('space', 'y6');
        $this->dropColumn('space', 'x7');
        $this->dropColumn('space', 'y7');
        $this->dropColumn('space', 'x8');
        $this->dropColumn('space', 'y8');
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
