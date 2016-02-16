<?php

use yii\db\Migration;

class m160216_201950_create_billing_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB COMMENT "Таблица платежных систем"';
        }

        $this->createTable('{{%billing}}', [
            'id'         => $this->primaryKey() . ' COMMENT "ID"',
            'name'       => $this->string()->notNull()->unique() . ' COMMENT "Название платежной системы"',
            'created_at' => $this->integer()->notNull() . ' COMMENT "Дата создания"',
            'updated_at' => $this->integer()->notNull() . ' COMMENT "Дата изменения"',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%billing}}');
    }
}
