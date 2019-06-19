<?php

use yii\db\Migration;

/**
 * Class m190619_060936_addColumn
 */
class m190619_060936_addColumn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','user_id',
            $this->integer()->notNull());
        $this->addForeignKey('activity_usersFK','activity','user_id',
            'users','id','CASCADE','CASCADE');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity','user_id');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190619_060936_addColumn cannot be reverted.\n";

        return false;
    }
    */
}
