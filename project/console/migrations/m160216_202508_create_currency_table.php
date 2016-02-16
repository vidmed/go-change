<?php

use yii\db\Migration;

class m160216_202508_create_currency_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB COMMENT "Таблица валют платежных систем"';
        }

        $this->createTable('{{%currency}}', [
            'id'         => $this->primaryKey() . ' COMMENT "ID"',
            'name'       => $this->string()->notNull()->unique() . ' COMMENT "Название валюты"',
            'billing_id' => $this->integer()->notNull() . ' COMMENT "Ссылка на платежную систему"',
            'created_at' => $this->integer()->notNull() . ' COMMENT "Дата создания"',
            'updated_at' => $this->integer()->notNull() . ' COMMENT "Дата изменения"',
        ], $tableOptions);

        $this->addForeignKey('fk-currency-billing_id', 'currency', 'billing_id', 'billing', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%currency}}');
    }
}
