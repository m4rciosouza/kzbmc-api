<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "projeto_canvas_compartilhado".
 *
 * @property integer $id
 * @property integer $id_projeto_canvas
 * @property integer $id_usuario
 */
class ProjetoCanvasCompartilhado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projeto_canvas_compartilhado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_projeto_canvas', 'id_usuario'], 'required'],
            [['id_projeto_canvas', 'id_usuario'], 'integer'],
        	//[['id_projeto_canvas', 'id_usuario'], 'unique', 'targetAttribute' => ['id_projeto_canvas', 'id_usuario']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('projeto_canvas_compartilhado', 'ID'),
            'id_projeto_canvas' => Yii::t('projeto_canvas_compartilhado', 'Id Projeto Canvas'),
            'id_usuario' => Yii::t('projeto_canvas_compartilhado', 'Id Usuario'),
        ];
    }
    
    public function getProjetoCanvas()
    {
    	return $this->hasOne(ProjetoCanvas::className(), ['id' => 'id_projeto_canvas']);
    }
    
    public function fields()
    {
    	return [
    			'id',
    			'id_projeto_canvas',
    			'id_usuario',
    			'projetoCanvas'
    	];
    }
}
