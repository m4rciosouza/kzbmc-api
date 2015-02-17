<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Cookie;

class CoreController extends Controller
{
	private $idiomas = ['pt', 'en', 'es'];
	
	/**
	 * @inheritdoc
	 */
	public function beforeAction($action)
	{
		if (parent::beforeAction($action)) {
			$this->definirIdioma();			
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Define o idioma da aplicação.
	 * Armazena a informação do idioma selecionado no cookie.
	 */
	private function definirIdioma()
	{
		$lang = Yii::$app->getRequest()->getQueryParam('lang');
		if($lang && array_search($lang, $this->idiomas) !== false) {
			$cookie = new Cookie([
					'name' => 'kzcanvas_lang',
					'value' => $lang,
					'expire' => time() + 86400 * 365 * 5,
			]);
			Yii::$app->getResponse()->getCookies()->add($cookie);
			Yii::$app->language = $lang;
		}
		else {
			$cookieLang = \Yii::$app->getRequest()->getCookies()->getValue('kzcanvas_lang');
			Yii::$app->language = $cookieLang ? $cookieLang : 'en';
		}
	}
}