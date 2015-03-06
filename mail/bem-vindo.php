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
						<h3><?= Yii::t('app', 'Seja bem vindo ao KZ-Canvas!'); ?></h3>
						<p class="lead">
							<?= Yii::t('app', 'A partir de agora voce tera acesso a uma poderosa ferramenta de criacao de modelos canvas.'); ?>
						</p>
						<br />
						<p class="callout">
							<?= Yii::t('app', 'Acesse {url} para comecar a criar seus modelos canvas.', 
											['url' => Html::a(Yii::t('app', 'AQUI'), Url::home('http'))]); ?>
						</p>
						<br />				
						<table class="social" width="100%">
							<tr>
								<td>
									<br />
									<table align="left" class="_column">
										<tr>
											<td>				
												<h5 class="">
													<?= Yii::t('app', 'Utilize os seguintes dados para logar no sistema'); ?>:
												</h5>
												<p class="">
													<strong><?= Yii::t('app', 'Usuario'); ?>:</strong> <?= $email; ?>
													<br />
													<strong><?= Yii::t('app', 'Senha'); ?>:</strong> <?= Yii::t('app', 'Sua senha'); ?>
												</p>
											</td>
										</tr>
									</table>
									<span class="clear"></span>	
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</div>
		</td>
		<td></td>
	</tr>
</table>