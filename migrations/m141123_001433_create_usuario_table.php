<?php

use yii\db\Schema;
use yii\db\Migration;

class m141123_001433_create_usuario_table extends Migration
{
    public function up()
    {
    	$this->createTable('usuario', [
    			'id' => Schema::TYPE_PK,
    			'email' => 'varchar(200) NOT NULL',
    			'senha' => 'varchar(32) NOT NULL',
    			'lingua' => 'varchar(2) NOT NULL DEFAULT \'BR\'',
    			'ativo' => 'varchar(1) NOT NULL DEFAULT \'N\'',
    			'data_criacao' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
    	]);
    }

    public function down()
    {
        $this->dropTable('usuario');
    }
}
