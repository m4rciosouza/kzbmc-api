<?php

namespace app\modules\v1\models;

use Yii;
use yii\web\Link;
use yii\web\Linkable;
use yii\helpers\Url;
use app\modules\v1\models\Usuario;
use yii\db\Query;
use yii\web\ForbiddenHttpException;

/**
 * This is the model class for table "projeto_canvas_lean".
 *
 * @property integer $id
 * @property integer $id_usuario
 * @property string $nome
 * @property string $descricao
 * @property string $ativo
 * @property string $data_criacao
 */
class ProjetoCanvasLean extends \yii\db\ActiveRecord
{
	const ATIVO = 'S';
	const INATIVO = 'N';
	
	public $email;
	
	public function getUsuario()
	{
		return $this->hasOne(Usuario::className(), ['id' => 'id_usuario']);
	}
	
	public function getItensCanvas()
	{
		return $this->hasMany(ItemCanvasLean::className(), ['id_projeto_canvas' => 'id']);
	}
	
	public function getItens()
	{
		$itensCanvasArr = [];
		$itensCanvas = ItemCanvasLean::findAll(['id_projeto_canvas' => $this->id]);
		if(count($itensCanvas) > 0) {
			foreach($itensCanvas as $itemCanvas) {
				$itensCanvasArr[$itemCanvas->tipo][] = [
						'titulo' => $itemCanvas->titulo,
						'descricao' => $itemCanvas->descricao,
						'cor' => $itemCanvas->cor
					];
			}
		}
		return $itensCanvasArr;
	}
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projeto_canvas_lean';
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
    			//'itens'
    		];
    }
    
    public function validarUsuario($attribute, $params)
    {
    	$usuario = Usuario::findOne(['email' => $this->email, 'ativo' => Usuario::ATIVO]);
    	if($usuario) {
    		$this->id_usuario = $usuario->id;
    		return;
    	}
    	$this->addError('id_usuario', Yii::t('projeto_canvas', 'Usuario invalido'));
    }
    
    public function beforeDelete()
    {
    	if (parent::beforeDelete()) {
    		// valida se projeto pertence ao usuario
    		$email = Yii::$app->request->getQueryParam('email');
    		$usuario = Usuario::findOne(['email' => $email, 'ativo' => Usuario::ATIVO]);
    		if($usuario->id != $this->id_usuario) {
    			return false;
    		}   		
    		// remove dependencias
    		ItemCanvasLean::deleteAll(['id_projeto_canvas' => $this->id]);
    		ProjetoCanvasCompartilhadoLean::deleteAll(['id_projeto_canvas' => $this->id]);
    		return true;
    	} else {
    		return false;
    	}
    }
    
    public function beforeSave($insert)
    {
    	if (parent::beforeSave($insert)) {
    		$usuario = Usuario::findOne($this->id_usuario);
    		if($insert) { 
    			if($this->possuiPlanoBasico($usuario) || !$this->possuiPlanoPremiumValido($usuario)) {
	    			$numProjetos = ProjetoCanvasLean::find()->where('id_usuario=:id_usuario', 
	    								[':id_usuario' => $this->id_usuario])->count();
	    			if($numProjetos >= 1) {
	    				throw new ForbiddenHttpException('Not allowed', 403);
	    			}
    			}
    		}
    		return true;
    	}
    	else {
    		return false;
    	}
    }
    
    private function possuiPlanoBasico($usuario)
    {
    	return $usuario->plano_assinatura == Usuario::PLANO_BASICO;
    }
    
    private function possuiPlanoPremium($usuario)
    {
    	return $usuario->plano_assinatura == Usuario::PLANO_PREMIUM;
    }
    
    private function possuiPlanoPremiumValido($usuario)
    {
    	if(!$this->possuiPlanoPremium($usuario)) {
    		return false;
    	}
    	
    	return strtotime($usuario->data_exp_assinatura) >= time();
    }
    
    public static function findOne($id, $validateUser=true)
    {    	
    	$condition = ['id' => $id];
    	if($validateUser) {
	    	$email = Usuario::getRequestedEmail();
	    	$usuario = Usuario::findOne(['email' => $email, 'ativo' => Usuario::ATIVO]);
	    	if(!$usuario) {
	    		throw new ForbiddenHttpException('Not allowed', 403);
	    	}
	    	$condition['id_usuario'] = $usuario->id;
    	}
    	return parent::findOne($condition);
    }
}
