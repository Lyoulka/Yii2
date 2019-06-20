<?php

use yii\db\Migration;

/**
 * Class m190619_152020_InsertBase
 */
class m190619_152020_InsertBase extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {   $password1 = \Yii::$app->security->generatePasswordHash(123456);
        $password2 = \Yii::$app->security->generatePasswordHash(123456);
        $this->insert('users',[
            'id'=>1,
            'email'=>'test@test.ru',
            'password_hash'=>$password1,
        ]);
        $this->insert('users',[
            'id'=>2,
            'email'=>'test2@test.ru',
            'password_hash'=>$password2,
        ]);
        $this->batchInsert('activity',['title',
            'startDate','isBlocked','user_id'],[
            ['заголовк '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),1],
            ['заголовк '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),1],
            ['заголовк '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),1],
            ['заголовк '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),2],
            ['заголовк '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),2],
            ['заголовк '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),2],
            ['заголовк '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),2],
            ['заголовк '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),2],
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('activity');
        $this->delete('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190619_152020_InsertBase cannot be reverted.\n";

        return false;
    }
    */
}
