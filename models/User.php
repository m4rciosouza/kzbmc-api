<?php

namespace app\models;

use yii\web\ForbiddenHttpException;
use Yii;
use JWT;
use app\modules\v1\models\Usuario;
use yii\web\UnauthorizedHttpException;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
    ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    	try {
    		$tokenData = JWT::decode($token, Yii::$app->params['jwt_key']);
    	}
    	catch(\Exception $e) {
    		throw new UnauthorizedHttpException('Unauthorized', 401);
    	}
    	
    	static::validateQueryEmail($tokenData->iss);
    	
    	$usuario = Usuario::findOne(['email' => $tokenData->iss]);
    	if($usuario->token == $token && $tokenData->exp >= time()) {
    		$usuario->token = $usuario->generateJwtToken();
    		if($usuario->save()) {
	    		header("X-Token: {$usuario->token}");
	    		return new static(self::$users[100]);
    		}
    	}
        return null;
    }
    
    protected static function validateQueryEmail($userEmail)
    {
    	$email = null;
    	if(Yii::$app->request->getIsGet() || Yii::$app->request->getIsDelete()) {
    		$email = Yii::$app->request->getQueryParam('email');
    	}
    	if(Yii::$app->request->getIsPost() || Yii::$app->request->getIsPut()) {
    		$email = Yii::$app->request->post('email');
    	}
    	if($email != $userEmail) {
    		throw new ForbiddenHttpException('Not allowed', 403);
    	}
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
