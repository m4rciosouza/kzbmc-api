<?php

namespace app\models;

use Yii;

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
    				return $model->ativo == 'S' ? 'Sim' : 'Nao';
    			},
    	];
    }
}