<?php

use yii\db\Migration;

/**
 * Class m190627_063056_use_notification
 */
class m190627_063056_use_notification extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','use_notification',
            $this->tinyInteger(4)->notNull());

    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity','use_notification');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190627_063056_use_notification cannot be reverted.\n";

        return false;
    }
    */
}
