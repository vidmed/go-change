<?php

use yii\db\Migration;

class m160216_203327_create_rate_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB COMMENT "Таблица курсов валют"';
        }

        $this->createTable('{{%rate}}', [
            'id'               => $this->primaryKey() . ' COMMENT "ID"',
            'from_currency_id' => $this->integer()->notNull() . ' COMMENT "Ссылка на валюту платежную систему"',
            'to_currency_id'   => $this->integer()->notNull() . ' COMMENT "Ссылка на валюту платежную систему"',
            'from_amount'      => $this->float()->notNull() . ' COMMENT "Отдаете"',
            'to_amount'        => $this->float()->notNull() . ' COMMENT "Получаете"',
            'created_at'       => $this->integer()->notNull() . ' COMMENT "Дата создания"',
            'updated_at'       => $this->integer()->notNull() . ' COMMENT "Дата изменения"',
        ], $tableOptions);

        $this->addForeignKey('fk-rate-from_currency_id', 'rate', 'from_currency_id', 'currency', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-rate-to_currency_id', 'rate', 'to_currency_id', 'currency', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%rate}}');
    }
}
