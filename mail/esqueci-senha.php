<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<h2><?= Yii::t('app', 'KZ-Canvas'); ?></h2>
<br />
<p>
		<strong>
			<u><?= Yii::t('app', 'Uma solicitacao de troca de senha foi efetuada para o usuario'); ?></u> 
			<?= $email; ?>
		</strong>
</p>
<br />
<p>
	<?= Yii::t('app', 'Acesse {url} para definir uma nova senha.', 
						['url' => Html::a(Yii::t('app', 'AQUI'), Url::home('http') . $url)]); ?>
</p>
<br />
<p>
	<?= Yii::t('app', 'Caso voce nao tenha solicitado a troca, pedimos que desconsidere esta mensagem.'); ?>
</p>
<br />
<?= Yii::t('app', 'Equipe KZ-Canvas.'); ?>