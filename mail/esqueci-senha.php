<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">
			<div class="content">
			<table>
				<tr>
					<td>
						<h3><?= Yii::t('app', 'KZ-Canvas'); ?></h3>
						<p class="lead">
							<?= Yii::t('app', 'Uma solicitacao de troca de senha foi efetuada para o usuario'); ?> 
							<?= $email; ?>
						</p>
						<br />
						<p class="callout">
							<?= Yii::t('app', 'Acesse {url} para definir uma nova senha.', 
									['url' => Html::a(Yii::t('app', 'AQUI'), $url)]); ?>
						</p>
						<br />				
						<p>
							<i>* <?= Yii::t('app', 'Caso voce nao tenha solicitado a troca, pedimos que desconsidere esta mensagem.'); ?></i>
						</p>
					</td>
				</tr>
			</table>
			</div>
		</td>
		<td></td>
	</tr>
</table>