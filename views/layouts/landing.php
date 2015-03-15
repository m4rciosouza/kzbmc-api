<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

//AppAsset::register($this);
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" lang="<?= Yii::$app->language ?>">
<!--<![endif]-->
	<head>
	    <meta charset="<?= Yii::$app->charset ?>" />
	    <meta name="keywords" content="<?= Yii::t('landing', 'Canvas e Modelo de Negocios, Lean Model Canvas') ?>" />
	    <meta name="description" content="<?= Yii::t('landing', 'Solucao completa para criacao de Canvas de Modelo de Negocios e Lean Model Canvas') ?>" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <link rel="icon" type="image/x-icon" href="<?= Yii::$app->homeUrl; ?>favicon.ico" />
	    <link rel="shortcut icon" href="<?= Yii::$app->homeUrl; ?>favicon.ico" type="image/x-icon" />
	    <link href='http://fonts.googleapis.com/css?family=Roboto:300,500' rel='stylesheet' type='text/css' />
	    <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,300' rel='stylesheet' type='text/css' />
	    
	    <link href="<?= Yii::$app->homeUrl; ?>css/landing/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	    <link href="<?= Yii::$app->homeUrl; ?>css/landing/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	    <link href="<?= Yii::$app->homeUrl; ?>css/landing/css/font-awesome.min.css" rel="stylesheet" />
	    <link href="<?= Yii::$app->homeUrl; ?>css/landing/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" />
	    <link href="<?= Yii::$app->homeUrl; ?>css/landing/css/style.css" rel="stylesheet" />
	    
	    <title><?= Html::encode($this->title) ?></title>
	</head>
	
	<body class="side-menu-push">
		
			<!-- Start Header -->
		    <header class="header">
		        <div class="section clearfix">
		            <h1 class="site-name"><?= Yii::t('app', 'KAZ-Canvas') ?></h1>
		            <div id="push-menu"><span>Push</span></div>
		            <nav>
		                <a href="#home"><?= Yii::t('landing', 'Home') ?></a>
		                <a href="#features"><?= Yii::t('landing', 'Produtos') ?></a>
		                <a href="#team"><?= Yii::t('landing', 'Caracteristicas') ?></a>
		                <a href="#gallery"><?= Yii::t('landing', 'Galeria') ?></a>
		                <a href="#pricing"><?= Yii::t('landing', 'Precos') ?></a>
		                <a href="#contact"><?= Yii::t('landing', 'Contato') ?></a>
		                <a href="#" class="kz_mouse_cursor">
            				<img src="<?= Yii::$app->homeUrl; ?>images/flag_brasil.png" alt="<?= Yii::t('app', 'Portugues'); ?>" 
            					width="25" onclick="setLang('pt')" />
            				<?php /* 
					        <img src="<?= Yii::$app->homeUrl; ?>images/flag_spain.png" alt="<?= Yii::t('app', 'Espanhol'); ?>" 
					        	width="25" onclick="setLang('es')" />
					        */ ?>
					        <img src="<?= Yii::$app->homeUrl; ?>images/flag_united_kingdom.png" alt="<?= Yii::t('app', 'Ingles'); ?>" 
					        	width="25" onclick="setLang('en')" />
            			</a>
		            </nav>
		        </div>
		    </header>
		    <!-- End Header -->
		
			<?= $content ?>
			
			<footer class="footer">
		        <div class="container">
		        	<br />
		            <p style="text-align: center;">
		            	&copy; 
		            	<a href="http://kazcanvas.com" alt="<?= Yii::t('app', 'KAZ-Canvas'); ?>" 
		            		title="<?= Yii::t('app', 'KAZ-Canvas'); ?>">
		            		<?= Yii::t('app', 'KAZ-Canvas'); ?>
		            	</a> 
		            	<?= date('Y') ?>
		            </p>
		        </div>
		    </footer>
			
			<script src="<?= Yii::$app->homeUrl; ?>js/landing/js/jquery-1.10.2.min.js"></script>
		    <script src="<?= Yii::$app->homeUrl; ?>js/landing/js/modernizr.custom.js"></script>
		    <script src="<?= Yii::$app->homeUrl; ?>js/landing/js/jquery.flexslider-min.js"></script>
		    <script src="<?= Yii::$app->homeUrl; ?>css/landing/fancybox/jquery.fancybox-1.3.4.js"></script>
		    <script src="<?= Yii::$app->homeUrl; ?>js/landing/js/main.js"></script>
		    <script>
		    function setLang(lang) {
		        var url = '<?= Yii::$app->getUrlManager()->createAbsoluteUrl('site/index'); ?>';
				location.href = url + '?lang=' + lang;
			}
		    </script>
			
	</body>
</html>