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
	const ATIVO = 'S';
	const INATIVO = 'N';
	const LINGUA_EN = 'en';
	const LINGUA_PT = 'pt';
	const LINGUA_ES = 'es';
	
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
            [['email'], 'required'],
        	[['senha'], 'required', 'on' => ['insert']],
            [['data_criacao'], 'safe'],
            [['email'], 'string', 'max' => 200],
        	[['email'], 'unique'],
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
	    	if($insert || strlen($this->senha) < 32) {
	    		if(empty($this->senha)) {
		    		$usuario = $this->findOne($this->id);
		    		$this->senha = $usuario->senha;    			
	    		}
	    		else {
		    		$this->senha = md5($this->senha);
	    		}
	    	}
    		return true;
    	} 
    	else {
    		return false;
    	}
    }
    
    public function load($data, $formName = null)
    {
    	if(Yii::$app->request->getIsPost()) {
    		$this->scenario = 'insert';
    	}
    	return parent::load($data, $formName);
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
    	$token = array(
    			'iss' => $this->email,
    			'aud' => $this->email,
    			'iat' => time(),
    			'exp' => Yii::$app->params['jwt_exp_time'],
    			// custom attrs
    			'ip' => static::getIp(),
    			'user_agent' => static::getUserAgent(),
    			'id' => $this->id
    	);
    	return JWT::encode($token, Yii::$app->params['jwt_key']);
    }
    
    public static function getUserAgent()
    {
    	return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'UNKNOWN';
    }
    
    public static function getIp()
    {
    	$ipaddress = '';
    	if(isset($_SERVER['HTTP_CLIENT_IP']))
    		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    	else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    	else if(isset($_SERVER['HTTP_X_FORWARDED']))
    		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    	else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    	else if(isset($_SERVER['HTTP_FORWARDED']))
    		$ipaddress = $_SERVER['HTTP_FORWARDED'];
    	else if(isset($_SERVER['REMOTE_ADDR']))
    		$ipaddress = $_SERVER['REMOTE_ADDR'];
    	else
    		$ipaddress = 'UNKNOWN';
    	return $ipaddress;
    }
    
    public static function gerarSenha()
    {
    	return ucwords(substr(md5(time() + uniqid()), 24));
    }
}