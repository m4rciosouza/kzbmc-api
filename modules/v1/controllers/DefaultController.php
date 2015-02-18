<?php

namespace app\modules\v1\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
    	\Yii::$app->end();
        //return $this->render('index');
    }
    
    public function actionError()
    {
    	$exception = \Yii::$app->errorHandler->exception;
    	echo "{$exception->statusCode} - {$exception->getName()}";
    	\Yii::$app->end();
    }
}
