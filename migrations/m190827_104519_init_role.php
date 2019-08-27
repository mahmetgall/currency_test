<?php

use yii\db\Migration;

/**
 * Class m190827_104519_init_role
 */
class m190827_104519_init_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$auth = Yii::$app->authManager;

		$author = $auth->createRole('admin');
		$auth->add($author);
		
        $author = $auth->createRole('user');
        $auth->add($author);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190827_104519_init_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190827_104519_init_role cannot be reverted.\n";

        return false;
    }
    */
}
