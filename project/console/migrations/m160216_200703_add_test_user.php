<?php

use yii\db\Migration;
use console\models\User;

class m160216_200703_add_test_user extends Migration
{
    public function up()
    {
        $user           = new User();
        $user->username = 'admin';
        $user->email    = 'admin@example.com';
        $user->generateAuthKey();
        $user->generatePasswordResetToken();
        $user->setPassword('admin');
        return $user->insert();
    }

    public function down()
    {
        $user = User::findByUsername('admin');
        return $user->delete();
    }
}
