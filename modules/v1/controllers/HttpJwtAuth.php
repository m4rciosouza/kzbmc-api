<?php

namespace app\modules\v1\controllers;

use yii\filters\auth\AuthMethod;

/**
 * HttpJwtAuth is an action filter that supports the authentication method based on JWT HTTP Bearer token.
 *
 * @author Marcio C. de Souza <marcio@kazale.com>
 * @since 1.0
 */
class HttpJwtAuth extends AuthMethod
{
    /**
     * @inheritdoc
     */
    public function authenticate($user, $request, $response)
    {
    	if($request->getIsOptions()) {
    		return true;
    	}
    	
        $authHeader = $request->getHeaders()->get('Authorization');
        if ($authHeader !== null && preg_match("/^Bearer\\s+(.*?)$/", $authHeader, $matches)) {
            $identity = $user->loginByAccessToken($matches[1], get_class($this));
            if ($identity === null) {
                $this->handleFailure($response);
            }
            return $identity;
        }

        return null;
    }
}
