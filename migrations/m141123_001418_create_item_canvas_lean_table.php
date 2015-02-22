<?php

use yii\db\Schema;
use yii\db\Migration;

class m141123_001418_create_item_canvas_lean_table extends Migration
{
    public function up()
    {
    	$this->createTable('item_canvas_lean', [
    			'id' => Schema::TYPE_PK,
    			'id_projeto_canvas' => 'int(11) NOT NULL',
    			'tipo' => 'varchar(3) NOT NULL',
    			'titulo' => 'varchar(50) NOT NULL',
    			'descricao' => 'text NOT NULL',
    			'cor' => 'varchar(20) NOT NULL',
    			'data_criacao' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
    	]);
    }

    public function down()
    {
        $this->dropTable('item_canvas_lean');
    }
}
