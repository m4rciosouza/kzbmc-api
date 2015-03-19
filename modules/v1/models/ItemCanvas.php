<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "item_canvas".
 *
 * @property integer $id
 * @property integer $id_projeto_canvas
 * @property string $tipo
 * @property string $titulo
 * @property string $descricao
 * @property string $cor
 * @property string $data_criacao
 */
class ItemCanvas extends \yii\db\ActiveRecord
{
	const PARCEIROS_CHAVE = 'pc';
	const ATIVIDADES_CHAVE = 'ac';
	const RECURSOS_CHAVE = 'rc';
	const PROPOSTAS_VALOR = 'pv';
	const RELACIONAMENTO_CLIENTES = 'rcl';
	const CANAIS = 'ca';
	const SEGMENTOS_CLIENTES = 'sc';
	const ESTRUTURA_CUSTO = 'ec';
	const FLUXO_RECEITA = 'fr';
	
	public function getProjetoCanvas()
	{
		return $this->hasOne(ProjetoCanvas::className(), ['id' => 'id_projeto_canvas']);
	}
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_canvas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_projeto_canvas', 'tipo', 'titulo', 'descricao', 'cor'], 'required'],
            [['id_projeto_canvas'], 'integer'],
            [['descricao'], 'string'],
            [['data_criacao'], 'safe'],
            [['tipo'], 'string', 'max' => 3],
            [['titulo'], 'string', 'max' => 50],
            [['cor'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('item_canvas', 'ID'),
            'id_projeto_canvas' => Yii::t('item_canvas', 'Id Projeto Canvas'),
            'tipo' => Yii::t('item_canvas', 'Tipo'),
            'titulo' => Yii::t('item_canvas', 'Titulo'),
            'descricao' => Yii::t('item_canvas', 'Descricao'),
            'cor' => Yii::t('item_canvas', 'Cor'),
            'data_criacao' => Yii::t('item_canvas', 'Data Criacao'),
        ];
    }
    
    public function fields()
    {
    	return [
    			'id',
    			'id_projeto_canvas',
    			'tipo',
    			'titulo',
    			'descricao',
    			'cor',
    			'projetoCanvas'
    		];
    }
    
    public static function getTipoArray()
    {
    	return [
    		self::PARCEIROS_CHAVE => [],
    		self::ATIVIDADES_CHAVE => [],
    		self::RECURSOS_CHAVE => [],
    		self::PROPOSTAS_VALOR => [],
    		self::RELACIONAMENTO_CLIENTES => [],
    		self::CANAIS => [],
    		self::SEGMENTOS_CLIENTES => [],
    		self::ESTRUTURA_CUSTO => [],
    		self::FLUXO_RECEITA => []
    	];
    }
}
