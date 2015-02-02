<?php
use yii\helpers\Html;
use yii\helpers\Url;
use \Yii;
?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<title><?= Html::encode(Yii::t('slideshow', 'Canvas de Modelo de Negócios | Kazale')) ?></title>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">

		<link rel="stylesheet" href="<?= Url::base() ?>/js/reveal.js-3.0.0/css/reveal.css">
		<link rel="stylesheet" href="<?= Url::base() ?>/js/reveal.js-3.0.0/css/theme/blood.css" id="theme">

		<!-- Code syntax highlighting -->
		<link rel="stylesheet" href="<?= Url::base() ?>/js/reveal.js-3.0.0/lib/css/zenburn.css">

		<!--[if lt IE 9]>
		<script src="<?= Url::base() ?>/js/reveal.js-3.0.0/lib/js/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="reveal">
			<div class="slides">
				<section>
					<h1><?= $projeto->nome ?></h1>
					<h3><?= $projeto->descricao ?></h3>
				</section>

				<?php /* Propostas de Valor */ ?>
				<?php if(isset($itens['pv']) && count($itens['pv'])): ?>
					<section>
						<section>
							<h1><?= Yii::t('slideshow', 'O QUE') ?></h1>
							<h3><?= Yii::t('slideshow', 'Propostas de Valor') ?></h3>
							<p><i>* <?= Yii::t('slideshow', 'Que valores nos entregamos ao cliente?') ?></i></p>
							<p><i>* <?= Yii::t('slideshow', 'Quais problemas dos nossos clientes estamos ajudando a resolver?') ?></i></p>
						</section>
						<?php foreach($itens['pv'] as $item ): ?>
							<section>
								<h2><?= Yii::t('slideshow', 'Propostas de Valor') ?></h2>
								<br />
								<h3><?= $item['titulo'] ?></h3> 
								<p><?= $item['descricao'] ?></p>
							</section>
						<?php endforeach; ?>
					</section>
				<?php endif; ?>
				
				<?php /* Segmentos de Clientes */ ?>
				<?php if(isset($itens['sc']) && count($itens['sc'])): ?>
					<section>
						<section>
							<h1><?= Yii::t('slideshow', 'QUEM') ?></h1>
							<h3><?= Yii::t('slideshow', 'Segmentos de Clientes') ?></h3>
							<p><i>* <?= Yii::t('slideshow', 'Para quem estamos criando valor?') ?></i></p>
							<p><i>* <?= Yii::t('slideshow', 'Quem sao nossos clientes mais importantes?') ?></i></p>
						</section>
						<?php foreach($itens['sc'] as $item ): ?>
							<section>
								<h2><?= Yii::t('slideshow', 'Segmentos de Clientes') ?></h2>
								<br />
								<h3><?= $item['titulo'] ?></h3> 
								<p><?= $item['descricao'] ?></p>
							</section>
						<?php endforeach; ?>
					</section>
				<?php endif; ?>
				
				<?php /* Relacionamento com os Clientes */ ?>
				<?php if(isset($itens['rcl']) && count($itens['rcl'])): ?>
					<section>
						<section>
							<h1><?= Yii::t('slideshow', 'QUEM') ?></h1>
							<h3><?= Yii::t('slideshow', 'Relacionamento com os Clientes') ?></h3>
							<p><i>* <?= Yii::t('slideshow', 'Que tipo de relacionamento temos com cada um de nossos Clientes?') ?></i></p>
							<p><i>* <?= Yii::t('slideshow', 'O que os segmentos esperam que possamos estabelecer e manter com eles?') ?></i></p>
						</section>
						<?php foreach($itens['rcl'] as $item ): ?>
							<section>
								<h2><?= Yii::t('slideshow', 'Relacionamento com os Clientes') ?></h2>
								<br />
								<h3><?= $item['titulo'] ?></h3> 
								<p><?= $item['descricao'] ?></p>
							</section>
						<?php endforeach; ?>
					</section>
				<?php endif; ?>
				
				<?php /* Canais */ ?>
				<?php if(isset($itens['ca']) && count($itens['ca'])): ?>
					<section>
						<section>
							<h1><?= Yii::t('slideshow', 'QUEM') ?></h1>
							<h3><?= Yii::t('slideshow', 'Canais') ?></h3>
							<p><i>* <?= Yii::t('slideshow', 'Atraves de quais canais de nossos Segmentos de Clientes gostariamos de atingir?') ?></i></p>
							<p><i>* <?= Yii::t('slideshow', 'Como podemos alcanca-los agora?') ?></i></p>
						</section>
						<?php foreach($itens['ca'] as $item ): ?>
							<section>
								<h2><?= Yii::t('slideshow', 'Canais') ?></h2>
								<br />
								<h3><?= $item['titulo'] ?></h3> 
								<p><?= $item['descricao'] ?></p>
							</section>
						<?php endforeach; ?>
					</section>
				<?php endif; ?>
				
				<?php /* Parceiros Chave */ ?>
				<?php if(isset($itens['pc']) && count($itens['pc'])): ?>
					<section>
						<section>
							<h1><?= Yii::t('slideshow', 'COMO') ?></h1>
							<h3><?= Yii::t('slideshow', 'Parceiros Chave') ?></h3>
							<p><i>* <?= Yii::t('slideshow', 'Quem sao os nossos Parceiros Chave?') ?></i></p>
							<p><i>* <?= Yii::t('slideshow', 'Quem sao os nossos Fornecedores Chave?') ?></i></p>
						</section>
						<?php foreach($itens['pc'] as $item ): ?>
							<section>
								<h2><?= Yii::t('slideshow', 'Parceiros Chave') ?></h2>
								<br />
								<h3><?= $item['titulo'] ?></h3> 
								<p><?= $item['descricao'] ?></p>
							</section>
						<?php endforeach; ?>
					</section>
				<?php endif; ?>
				
				<?php /* Atividades Chave */ ?>
				<?php if(isset($itens['ac']) && count($itens['ac'])): ?>
					<section>
						<section>
							<h1><?= Yii::t('slideshow', 'COMO') ?></h1>
							<h3><?= Yii::t('slideshow', 'Atividades Chave') ?></h3>
							<p><i>* <?= Yii::t('slideshow', 'Quais Atividades Chave nossa Proposta de Valor exige?') ?></i></p>
							<p><i>* <?= Yii::t('slideshow', 'Nossos Canais de Distribuicao?') ?></i></p>
						</section>
						<?php foreach($itens['ac'] as $item ): ?>
							<section>
								<h2><?= Yii::t('slideshow', 'Atividades Chave') ?></h2>
								<br />
								<h3><?= $item['titulo'] ?></h3> 
								<p><?= $item['descricao'] ?></p>
							</section>
						<?php endforeach; ?>
					</section>
				<?php endif; ?>
				
				<?php /* Recursos Chave */ ?>
				<?php if(isset($itens['rc']) && count($itens['rc'])): ?>
					<section>
						<section>
							<h1><?= Yii::t('slideshow', 'COMO') ?></h1>
							<h3><?= Yii::t('slideshow', 'Recursos Chave') ?></h3>
							<p><i>* <?= Yii::t('slideshow', 'Quais Recursos Chave nossa Proposta de Valor requer?') ?></i></p>
							<p><i>* <?= Yii::t('slideshow', 'Nossos canais de distribuicao?') ?></i></p>
						</section>
						<?php foreach($itens['rc'] as $item ): ?>
							<section>
								<h2><?= Yii::t('slideshow', 'Recursos Chave') ?></h2>
								<br />
								<h3><?= $item['titulo'] ?></h3> 
								<p><?= $item['descricao'] ?></p>
							</section>
						<?php endforeach; ?>
					</section>
				<?php endif; ?>
				
				<?php /* Fluxo de Receita */ ?>
				<?php if(isset($itens['fr']) && count($itens['fr'])): ?>
					<section>
						<section>
							<h1><?= Yii::t('slideshow', 'QUANTO') ?></h1>
							<h3><?= Yii::t('slideshow', 'Fluxo de Receita') ?></h3>
							<p><i>* <?= Yii::t('slideshow', 'Por quais valores nossos clientes estao realmente interessados em pagar?') ?></i></p>
							<p><i>* <?= Yii::t('slideshow', 'Por quais eles pagam atualmente?') ?></i></p>
						</section>
						<?php foreach($itens['fr'] as $item ): ?>
							<section>
								<h2><?= Yii::t('slideshow', 'Fluxo de Receita') ?></h2>
								<br />
								<h3><?= $item['titulo'] ?></h3> 
								<p><?= $item['descricao'] ?></p>
							</section>
						<?php endforeach; ?>
					</section>
				<?php endif; ?>
				
				<?php /* Estrutura de Custo */ ?>
				<?php if(isset($itens['ec']) && count($itens['ec'])): ?>
					<section>
						<section>
							<h1><?= Yii::t('slideshow', 'QUANTO') ?></h1>
							<h3><?= Yii::t('slideshow', 'Estrutura de Custo') ?></h3>
							<p><i>* <?= Yii::t('slideshow', 'Quais sao os custos mais importantes inerentes ao nosso modelo de negocio?') ?></i></p>
							<p><i>* <?= Yii::t('slideshow', 'Quais sao os Recursos Chave mais caros?') ?></i></p>
						</section>
						<?php foreach($itens['ec'] as $item ): ?>
							<section>
								<h2><?= Yii::t('slideshow', 'Estrutura de Custo') ?></h2>
								<br />
								<h3><?= $item['titulo'] ?></h3> 
								<p><?= $item['descricao'] ?></p>
							</section>
						<?php endforeach; ?>
					</section>
				<?php endif; ?>

				<section>
					<h1><?= Yii::t('slideshow', 'FIM') ?></h1>
				</section>
			</div>
		</div>

		<script src="<?= Url::base() ?>/js/reveal.js-3.0.0/lib/js/head.min.js"></script>
		<script src="<?= Url::base() ?>/js/reveal.js-3.0.0/js/reveal.js"></script>

		<script>
			// Full list of configuration options available at:
			// https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				controls: true,
				progress: true,
				history: true,
				center: true,

				transition: 'convex', // none/fade/slide/convex/concave/zoom

				// Optional reveal.js plugins
				dependencies: [
					{ src: '<?= Url::base() ?>/js/reveal.js-3.0.0/lib/js/classList.js', condition: function() { return !document.body.classList; } },
					{ src: '<?= Url::base() ?>/js/reveal.js-3.0.0/plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: '<?= Url::base() ?>/js/reveal.js-3.0.0/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: '<?= Url::base() ?>/js/reveal.js-3.0.0/plugin/highlight/highlight.js', async: true, condition: function() { return !!document.querySelector( 'pre code' ); }, callback: function() { hljs.initHighlightingOnLoad(); } },
					{ src: '<?= Url::base() ?>/js/reveal.js-3.0.0/plugin/zoom-js/zoom.js', async: true },
					{ src: '<?= Url::base() ?>/js/reveal.js-3.0.0/plugin/notes/notes.js', async: true }
				]
			});
		</script>
	</body>
</html>