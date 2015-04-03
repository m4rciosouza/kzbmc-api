<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\controllers\CoreController;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\HttpException;

class SiteController extends CoreController
{
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                	'contact' => ['post', 'get']
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
    	$this->layout = 'landing';
    	return $this->render('landingIndex');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionContact() 
    {
    	$params = Yii::$app->getRequest()->post();
     	$contactName = $this->sanitizeInput($params['contactName']);
     	$contactEmail = $this->sanitizeInput($params['contactEmail']);
     	$contactSubject = $this->sanitizeInput($params['contactSubject']);
     	$contactMessage = $this->sanitizeInput($params['contactMessage']);
    	
     	if(empty($contactEmail) || !preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", $contactEmail)) {
     		throw new HttpException(400, 'Invalid data');
     	}
     	
     	Yii::$app->mailer->compose()
	     	->setFrom(Yii::$app->params['adminEmail'])
	     	->setTo('marcio@kazale.com')
	     	->setSubject("KAZ-Canvas contato - $contactSubject")
	     	->setHtmlBody("Nome: $contactName &lt;$contactEmail&gt;<br /><br />Mensagem:<br /><br />$contactMessage")
	     	->send();
     	
    	Yii::$app->end();
    }
    
    private function sanitizeInput($data) {
    	$data = trim($data);
    	$data = stripslashes($data);
    	$data = htmlspecialchars($data);
    	return $data;
    }
}
