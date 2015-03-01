<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?= Yii::$app->homeUrl; ?>favicon.ico" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Yii::t('app', 'KAZ-Canvas'),
                'brandUrl' => Yii::$app->homeUrl.'site',
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]); ?>
        
        	<ul class="nav navbar-nav navbar-right">
            	<li class="dropdown">
            		<a ng-href="" class="dropdown-toggle kz_mouse_cursor" data-toggle="dropdown" role="button" aria-expanded="false">
            			&nbsp;&nbsp;&nbsp;
            			<?= Yii::t('app', 'Lingua'); ?> <span class="caret"></span>
            		</a>
            		<ul class="dropdown-menu" role="menu">
            			<li>
            				<a ng-href="" class="kz_mouse_cursor" onclick="setLang('pt')">
            					<img src="<?= Yii::$app->homeUrl; ?>images/flag_brasil.png" 
            						alt="<?= Yii::t('app', 'Portugues'); ?>" width="25" />
					            <?= Yii::t('app', 'Portugues'); ?>
					            <?php if(Yii::$app->language == 'pt'): ?>
					            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					            <?php endif; ?>
            				</a>
            			</li>
            			<li>
            				<a ng-href="" class="kz_mouse_cursor" onclick="setLang('es')">
					            <img src="<?= Yii::$app->homeUrl; ?>images/flag_spain.png" 
					            	alt="<?= Yii::t('app', 'Espanhol'); ?>" width="25" />
					            <?= Yii::t('app', 'Espanhol'); ?>
					            <?php if(Yii::$app->language == 'es'): ?>
					            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					            <?php endif; ?>
            				</a>
            			</li>
            			<li>
				            <a ng-href="" class="kz_mouse_cursor" onclick="setLang('en')">
					            <img src="<?= Yii::$app->homeUrl; ?>images/flag_united_kingdom.png" 
					            	alt="<?= Yii::t('app', 'Ingles'); ?>" width="25" />
					            <?= Yii::t('app', 'Ingles'); ?>
					            <?php if(Yii::$app->language == 'en'): ?>
					            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					            <?php endif; ?>
            				</a>
            			</li>
            		</ul>
            	</li>
            </ul>
            
        <?php
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                	['label' => 'Projetos Canvas', 'url' => ['/projetocanvas/index'], 'visible' => !Yii::$app->user->isGuest],
                	['label' => 'Itens Canvas', 'url' => ['/itemcanvas/index'], 'visible' => !Yii::$app->user->isGuest],
                	['label' => 'Projetos Canvas Comp.', 'url' => ['/projetocanvascompartilhado/index'], 'visible' => !Yii::$app->user->isGuest],
                	['label' => 'Usuarios', 'url' => ['/usuario/index'], 'visible' => !Yii::$app->user->isGuest],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">
            	&copy; 
            	<a href="http://kazcanvas.com" alt="<?= Yii::t('app', 'KAZ-Canvas'); ?>" 
            		title="<?= Yii::t('app', 'KAZ-Canvas'); ?>">
            		<?= Yii::t('app', 'KAZ-Canvas'); ?>
            	</a> 
            	<?= date('Y') ?>
            </p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
    <script>
    function setLang(lang) {
        var url = '<?= Yii::$app->getUrlManager()->createAbsoluteUrl('site/index'); ?>';
		location.href = url + '?lang=' + lang;
	}
    </script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>