<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<h2><?= Yii::t('app', 'Seja bem vindo ao KZ-Canvas!'); ?></h2>
<br />
<p>
	<strong>
		<?= Yii::t('app', 'A partir de agora voce tera acesso a uma poderosa ferramenta de criacao de modelos canvas.'); ?>
	</strong>
</p>
<br />
<p>
	<?= Yii::t('app', 'Acesse {url} para comecar a criar seus modelos canvas.', 
						['url' => Html::a(Yii::t('app', 'AQUI'), Url::home('http'))]); ?>
</p>
<br />
<p>
	<?= Yii::t('app', 'Utilize os seguintes dados para logar no sistema'); ?>:
</p>
<p>
	<u><?= Yii::t('app', 'Usuario'); ?>:</u> <?= $email; ?>
</p>
<p>
	<u><?= Yii::t('app', 'Senha'); ?>:</u> <?= Yii::t('app', 'Sua senha'); ?>
</p>
<br />
<?= Yii::t('app', 'Equipe KZ-Canvas.'); ?>