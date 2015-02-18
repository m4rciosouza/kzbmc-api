<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<h2><?= Yii::t('app', 'KZ-Canvas'); ?></h2>
<br />
<p>
	<u>
		<strong>
			<?= Yii::t('app', 'O projeto {nomeProjetoCanvas} foi compartilhado com voce.', 
							['nomeProjetoCanvas' => $nomeProjetoCanvas]); ?>
		</strong>
	</u>
</p>
<br />
<p>
	<?= Yii::t('app', 'Acesse {url} para visualizar o projeto compartilhado.', 
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
	<u><?= Yii::t('app', 'Senha'); ?>:</u> <?= (empty($senha) ? Yii::t('app', 'Sua senha') : $senha); ?>
</p>
<br />
<?= Yii::t('app', 'Equipe KZ-Canvas.'); ?>