<?php

use yii\db\Migration;

class m160210_070222_stock extends Migration
{
    public function up()
    {
        $this->createTable('goods_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'color' => $this->string(16),
        ]);

        $this->createTable('tenant', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'logo_image_id' => $this->integer(),
            'space_id' => $this->integer(),
            'goods_category_id' => $this->integer(),
            'work_time' => $this->string(),
            'description' => $this->text(),
            'photo_image_id' => $this->integer(),
            'phone' => $this->string(64),
            'site' => $this->string()
        ]);
        $this->addForeignKey('fk_tenant_logo__image_id', 'tenant', 'logo_image_id', 'image', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_tenant_photo__image_id', 'tenant', 'photo_image_id', 'image', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_tenant_space_id__space_id', 'tenant', 'space_id', 'space', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_tenant_category_id__category_id', 'tenant', 'goods_category_id', 'goods_category', 'id', 'SET NULL', 'CASCADE');

        $this->createTable('stock', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'description' => $this->text(),
            'photo_image_id' => $this->integer(),
            'min_photo_image_id' => $this->integer(),
            'tenant_id' => $this->integer(),
            'date_end' => $this->date()->defaultValue(null),
        ]);
        $this->addForeignKey('fk_stock_photo__image_id', 'stock', 'photo_image_id', 'image', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_stock_min_photo__image_id', 'stock', 'min_photo_image_id', 'image', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_stock_tenant_id__tenant_id', 'stock', 'tenant_id', 'tenant', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('stock');
        $this->dropTable('tenant');
        $this->dropTable('goods_category');
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
