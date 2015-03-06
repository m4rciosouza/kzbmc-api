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
							<?= Yii::t('app', 'O projeto {nomeProjetoCanvas} foi compartilhado com voce.', 
										['nomeProjetoCanvas' => $nomeProjetoCanvas]); ?>
						</p>
						<br />
						<p class="callout">
							<?= Yii::t('app', 'Acesse {url} para visualizar o projeto compartilhado.', 
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
													<strong><?= Yii::t('app', 'Senha'); ?>:</strong> 
													<?= (empty($senha) ? Yii::t('app', 'Sua senha') : $senha); ?>
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