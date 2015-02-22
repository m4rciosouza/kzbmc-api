<?php

use yii\db\Schema;
use yii\db\Migration;

class m141123_001349_create_projeto_canvas_lean_table extends Migration
{
    public function up()
    {
    	$this->createTable('projeto_canvas_lean', [
    			'id' => Schema::TYPE_PK,
    			'id_usuario' => 'int(11) NOT NULL',
    			'nome' => 'varchar(50) NOT NULL',
    			'descricao' => 'varchar(50) NOT NULL',
    			'ativo' => 'varchar(1) NOT NULL DEFAULT \'S\'',
    			'data_criacao' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
    	]);
    }

    public function down()
    {
        $this->dropTable('projeto_canvas_lean');
    }
}
