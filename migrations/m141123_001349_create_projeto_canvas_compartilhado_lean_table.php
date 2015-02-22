<?php

use yii\db\Schema;
use yii\db\Migration;

class m141123_001349_create_projeto_canvas_compartilhado_lean_table extends Migration
{
    public function up()
    {
    	$this->createTable('projeto_canvas_compartilhado_lean', [
    			'id' => Schema::TYPE_PK,
    			'id_usuario' => 'int(11) NOT NULL',
    			'id_projeto_canvas' => 'int(11) NOT NULL',
    	]);
    }

    public function down()
    {
        $this->dropTable('projeto_canvas_compartilhado_lean');
    }
}
