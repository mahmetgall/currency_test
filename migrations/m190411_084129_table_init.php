<?php

use yii\db\Migration;
 
/**
 * Class m190411_084129_table_init
 */
class m190411_084129_table_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => 'varchar(255)',
            'code' => 'varchar(20)',
            'img' => 'varchar(500)',
			'price' => 'numeric(14,2)',
            'description' => 'blob',
        ], 'engine=innodb');
		
		$this->createIndex('code_idx', 'product', 'code');
		

        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'name' => 'varchar(255)',
            'num_code' => 'int',
            'char_code' => 'varchar(10)',
			'nominal' => 'int',
			'value' => 'numeric(14,4)',
            'created_at' => 'int',
            'updated_at' => 'int',
        

        ], 'engine=innodb');
		
		$this->createIndex('num_code_idx', 'currency', 'num_code');
		
		 $this->createTable('user_currency', [
            'id' => $this->primaryKey(),
            'user_id' => 'int',
			'currency_id' => 'int',

        ], 'engine=innodb');
		 
		 $this->createIndex('user_id_idx', 'user_currency', 'user_id');
		 $this->createIndex('currency_id_idx', 'user_currency', 'currency_id');
		 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190411_084129_table_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190411_084129_table_init cannot be reverted.\n";

        return false;
    }
    */
}
