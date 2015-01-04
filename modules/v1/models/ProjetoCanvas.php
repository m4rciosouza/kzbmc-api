<?php

namespace app\modules\v1\models;

use Yii;
use yii\web\Link;
use yii\web\Linkable;
use yii\helpers\Url;
use app\modules\v1\models\Usuario;

/**
 * This is the model class for table "projeto_canvas".
 *
 * @property integer $id
 * @property integer $id_usuario
 * @property string $nome
 * @property string $descricao
 * @property string $ativo
 * @property string $data_criacao
 */
class ProjetoCanvas extends \yii\db\ActiveRecord
{
	public $email;
	
	public function getUsuario()
	{
		return $this->hasOne(Usuario::className(), ['id' => 'id_usuario']);
	}
	
	public function getItensCanvas()
	{
		return $this->hasMany(ItemCanvas::className(), ['id_projeto_canvas' => 'id']);
	}
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projeto_canvas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'nome', 'descricao'], 'required'],
        	[['email'], 'email'],
            [['nome', 'descricao'], 'string', 'max' => 50],
        	[['email'], 'string', 'max' => 200],
            [['ativo'], 'string', 'max' => 1],
            [['email'], 'validarUsuario'],
            [['data_criacao', 'id_usuario'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('projeto_canvas', 'ID'),
            'id_usuario' => Yii::t('projeto_canvas', 'Usuario'),
            'nome' => Yii::t('projeto_canvas', 'Nome'),
            'descricao' => Yii::t('projeto_canvas', 'Descricao'),
            'ativo' => Yii::t('projeto_canvas', 'Ativo'),
            'data_criacao' => Yii::t('projeto_canvas', 'Data Criacao'),
        ];
    }
    
    public function fields()
    {
    	return [
    			'id', 
    			'id_usuario', 
    			'nome', 
    			'descricao', 
    			'ativo' => function($model) { 
    							return $model->ativo == 'S' ? 'Sim' : 'Nao'; 
    						},
    			//'usuario',
    			//'itensCanvas'
    		];
    }
    
    public function validarUsuario($attribute, $params)
    {
    	$usuario = Usuario::findOne(['email' => $this->email]);
    	if($usuario) {
    		$this->id_usuario = $usuario->id;
    		return;
    	}
    	$this->addError('id_usuario', Yii::t('projeto_canvas', 'Usuario invalido'));
    }
}
