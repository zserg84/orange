<?php

use yii\db\Migration;

class m160222_072002_space_coords extends Migration
{
    public function up()
    {
        $this->addColumn('space', 'x1', $this->float(6));
        $this->addColumn('space', 'y1', $this->float(6));
        $this->addColumn('space', 'x2', $this->float(6));
        $this->addColumn('space', 'y2', $this->float(6));
        $this->addColumn('space', 'x3', $this->float(6));
        $this->addColumn('space', 'y3', $this->float(6));
        $this->addColumn('space', 'x4', $this->float(6));
        $this->addColumn('space', 'y4', $this->float(6));
    }

    public function down()
    {
        $this->dropColumn('space', 'x1');
        $this->dropColumn('space', 'y1');
        $this->dropColumn('space', 'x2');
        $this->dropColumn('space', 'y2');
        $this->dropColumn('space', 'x3');
        $this->dropColumn('space', 'y3');
        $this->dropColumn('space', 'x4');
        $this->dropColumn('space', 'y4');
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
