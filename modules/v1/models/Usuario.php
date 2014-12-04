<?php

namespace app\modules\v1\models;

use Yii;
use JWT;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $email
 * @property string $senha
 * @property string $ativo
 * @property string $lingua
 * @property string $data_criacao
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'senha'], 'required'],
            [['data_criacao'], 'safe'],
            [['email'], 'string', 'max' => 200],
            [['senha'], 'string', 'max' => 32],
            [['ativo'], 'string', 'max' => 1],
            [['lingua'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('usuario', 'ID'),
            'email' => Yii::t('usuario', 'Email'),
            'senha' => Yii::t('usuario', 'Senha'),
            'ativo' => Yii::t('usuario', 'Ativo'),
            'lingua' => Yii::t('usuario', 'Lingua'),
            'data_criacao' => Yii::t('usuario', 'Data Criacao'),
        ];
    }
    
    public function beforeSave($insert)
    {
    	if (parent::beforeSave($insert)) {
	    	if(!empty($this->senha) && $insert) {
	    		$this->senha = md5($this->senha);
	    	}
    		return true;
    	} 
    	else {
    		return false;
    	}
    }
    
    public function getProjetosCanvas()
    {
    	return $this->hasMany(ProjetoCanvas::className(), ['id_usuario' => 'id']);
    }
    
    public function fields()
    {
    	return [
    			'id',
    			'email',
    			'lingua',
    			'ativo' => function($model) {
    				return $model->ativo == 'S' ? true : false;
    			},
    	];
    }
    
    /**
     * Gera o token JWT(Json Web Token) de autenticação do usuário.
     * 
     * @return string
     */
    public function generateJwtToken()
    {
    	//TODO definir parametros corretos, como browser e IP...
    	$token = array(
    			'iss' => $this->email,
    			'aud' => $this->email,
    			'iat' => 1356999524,
    			'nbf' => 1357000000,
    			'exp' => Yii::$app->params['jwt_exp_time']
    	);
    	return JWT::encode($token, Yii::$app->params['jwt_key']);
    }
}