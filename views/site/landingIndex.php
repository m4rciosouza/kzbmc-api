<?php
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'KAZ-Canvas');
?>
	<!-- Start Home section -->
    <div id="home" class="home-section">
        <section class="section clearfix">
            <div id="homeCarousel" class="slider">
                <ul class="slides">
                	<?php /* 
                    <li class="slide row-fluid">
                        <div class="span8 offset4">
                            <img src="http://placehold.it/960x860" height="860" width="960" 
                            	alt="<?= Yii::t('landing', 'Solucao completa para criacao de modelos canvas') ?>" />
                        </div>
                        <div class="slide-caption">
                            <h2><?= Yii::t('landing', 'Solucao completa para criacao de modelos canvas') ?></h2>
                            <a href="#features" class="button button-buy"><?= Yii::t('landing', 'Testar') ?></a>
                        </div>
                    </li>
                    */ ?>
                    <li class="slide row-fluid">                        
                        <div class="span8 offset4">
                            <img src="<?= Yii::$app->homeUrl; ?>images/business-model-canvas-slide1.png" height="860" width="960" 
                            	alt="<?= Yii::t('landing', 'Canvas de Modelo de Negocios') ?>" />
                        </div>
                        <div class="slide-caption">
                            <h2><?= Yii::t('landing', 'Canvas de Modelo de Negocios') ?></h2>
                            <a href="http://businessmodel.kazcanvas.com" target="_blank" class="button button-buy">
                            	<?= Yii::t('landing', 'Testar') ?>
                            </a>
                        </div>
                    </li>
                    <li class="slide right-dir row-fluid">
                        <div class="span8">
                            <img src="<?= Yii::$app->homeUrl; ?>images/lean-model-canvas-slide2.png" height="860" width="960" 
                            	alt="<?= Yii::t('landing', 'Lean Model Canvas') ?>" />
                        </div>
                        <div class="slide-caption">
                            <h2><?= Yii::t('landing', 'Lean Model Canvas') ?></h2>
                            <a href="http://leanmodel.kazcanvas.com" target="_blank" class="button button-buy">
                            	<?= Yii::t('landing', 'Testar') ?>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <!-- End Home section -->

    <!-- Start Features section -->
    <div id="features" class="features-section">
        <section class="section clearfix">
            <div class="row-fluid text-center">
                <article class="span6 feature-item">
                    <div class="thumb">
                    	<a href="http://businessmodel.kazcanvas.com" target="_blank">
                        	<i class="icon-table"></i>
                        </a>
                    </div>
                    <h3>
                    	<a href="http://businessmodel.kazcanvas.com" target="_blank">
                    		<?= Yii::t('landing', 'Canvas de Modelo') ?><br /><?= Yii::t('landing', 'de Negocios') ?>
                    	</a>
                    </h3>
                    <p>
                    	<a href="http://businessmodel.kazcanvas.com" target="_blank">
                    		<?= Yii::t('landing', 'Ferramenta de criacao de Canvas de Modelo de Negocios online.') ?>
                    	</a>
                    </p>
                    <p>
                    	<a href="http://businessmodel.kazcanvas.com" class="button button-buy" target="_blank">
                    		<?= Yii::t('landing', 'Testar') ?>
                    	</a>
                    </p>
                </article>
                <article class="span6 feature-item">
                    <div class="thumb">
                    	<a href="http://leanmodel.kazcanvas.com" target="_blank">
                        	<i class="icon-th"></i>
                        </a>
                    </div>
                    <h3>
                    	<a href="http://leanmodel.kazcanvas.com" target="_blank">
                    		<?= Yii::t('landing', 'Lean Model') ?><br /><?= Yii::t('landing', 'Canvas') ?>
                    	</a>
                    </h3>
                    <p>
                    	<a href="http://leanmodel.kazcanvas.com" target="_blank">
                    		<?= Yii::t('landing', 'Ferramenta de criacao de Lean Model Canvas online.') ?>
                    	</a>
                    </p>
                    <p>
                    	<a href="http://leanmodel.kazcanvas.com" class="button button-buy" target="_blank">
                    		<?= Yii::t('landing', 'Testar') ?>
                    	</a>
                    </p>
                </article>
            </div>
        </section>
    </div>
    <!-- End Features section -->

    <!-- Start Team section -->
    <div id="team" class="team-section">
        <section class="section clearfix">
            <div class="row-fluid text-center">
                <div class="span8 offset2">
                    <h2 class="title"><?= Yii::t('landing', 'Caracteristicas') ?></h2>
                    <p><?= Yii::t('landing', 'Abaixo seguem as principais caracteristicas encontradas em ambos aplicativos, o Canvas de Modelo de Negocios e o Lean Model Canvas') ?>:</p>
                </div>
            </div>
            <div class="row-fluid text-center">
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-magic"></i>
		                    </div>
                        </span>
                        <figcaption><span><?= Yii::t('landing', 'Assistente de criacao') ?></span></figcaption>
                    </figure>
                </article>
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-print"></i>
		                    </div>
                        </span>
                        <figcaption><span><?= Yii::t('landing', 'Impressao em modo grafico e texto') ?></span></figcaption>
                    </figure>
                </article>
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-desktop"></i>
		                    </div>
                        </span>
                        <figcaption><span><?= Yii::t('landing', 'Slideshow 3D') ?></span></figcaption>
                    </figure>
                </article>
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-th"></i>
		                    </div>
                        </span>
                        <figcaption><span><?= Yii::t('landing', 'Post-its ilimitados por bloco, e em 4 cores distintas') ?></span></figcaption>
                    </figure>
                </article>
            </div>
            <div class="row-fluid text-center">
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-share"></i>
		                    </div>
                        </span>
                        <figcaption><span><?= Yii::t('landing', 'Compartilhamento com um amigo') ?></span></figcaption>
                    </figure>
                </article>
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-cloud-upload"></i>
		                    </div>
                        </span>
                        <figcaption><span><?= Yii::t('landing', 'Armazenamento na nuvem com sincronizacao automatica entre dispositivos') ?></span></figcaption>
                    </figure>
                </article>
                
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-tablet"></i>
		                    </div>
                        </span>
                        <figcaption><span><?= Yii::t('landing', 'Compativel com computadores e smartphones') ?></span></figcaption>
                    </figure>
                </article>
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-globe"></i>
		                    </div>
                        </span>
                        <figcaption><span><?= Yii::t('landing', 'Disponivel em Portugues, Ingles e Espanhol') ?></span></figcaption>
                    </figure>
                </article>
            </div>
        </section>
    </div>
    <!-- End Team section -->

    <!-- Start Gallery section -->
    <div id="gallery" class="gallery-section">
        <section class="section clearfix">
            <div class="row-fluid text-center">
                <div class="span8 offset2">
                    <h2 class="title"><?= Yii::t('landing', 'Galeria') ?></h2>
                    <p><?= Yii::t('landing', 'Confira algumas imagens do aplicativo') ?>:</p>
                </div>
            </div>
            <div class="gallery-list">
                <div class="row-fluid">
                    <figure class="span4">
                        <a href="<?= Yii::$app->homeUrl; ?>images/landing/business-model-canvas.png"
                        	title="<?= Yii::t('landing', 'Canvas de Modelo de Negocios') ?>">
                            <img src="<?= Yii::$app->homeUrl; ?>images/landing/business-model-canvas.png" 
                            	alt="<?= Yii::t('landing', 'Canvas de Modelo de Negocios') ?>" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                    <figure class="span4">
                        <a href="<?= Yii::$app->homeUrl; ?>images/landing/lean-model-canvas.png"
                        	title="<?= Yii::t('landing', 'Lean Model Canvas') ?>">
                            <img src="<?= Yii::$app->homeUrl; ?>images/landing/lean-model-canvas.png" 
                            	alt="<?= Yii::t('landing', 'Lean Model Canvas') ?>" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                    <figure class="span4">
                        <a href="<?= Yii::$app->homeUrl; ?>images/landing/canvas-list.png"
                        	title="<?= Yii::t('landing', 'Canvas') ?>">
                            <img src="<?= Yii::$app->homeUrl; ?>images/landing/canvas-list.png" 
                            	alt="<?= Yii::t('landing', 'Canvas') ?>" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                </div>
                <div class="row-fluid">
                    <figure class="span4">
                        <a href="<?= Yii::$app->homeUrl; ?>images/landing/canvas-wizard.png"
                        	title="<?= Yii::t('landing', 'Assistente de criacao') ?>">
                            <img src="<?= Yii::$app->homeUrl; ?>images/landing/canvas-wizard.png" 
                            	alt="<?= Yii::t('landing', 'Assistente de criacao') ?>" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                    <figure class="span4">
                        <a href="<?= Yii::$app->homeUrl; ?>images/landing/canvas-3d-slideshow.png"
                        	title="<?= Yii::t('landing', 'Slideshow 3D') ?>">
                            <img src="<?= Yii::$app->homeUrl; ?>images/landing/canvas-3d-slideshow.png" 
                            	alt="<?= Yii::t('landing', 'Slideshow 3D') ?>" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                    <figure class="span4">
                        <a href="<?= Yii::$app->homeUrl; ?>images/landing/canvas-text-template.png"
                        	title="<?= Yii::t('landing', 'Impressao em modo grafico e texto') ?>">
                            <img src="<?= Yii::$app->homeUrl; ?>images/landing/canvas-text-template.png" 
                            	alt="<?= Yii::t('landing', 'Impressao em modo grafico e texto') ?>" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                </div>
            </div>
        </section>
    </div>
    <!-- End Gallery section -->

    <!-- Start Pricing section -->
    <div id="pricing" class="pricing-section">
        <section class="section clearfix">
            <div class="row-fluid">
                <div class="span4">
                    <div class="price-item">
                        <strong class="price-title"><?= Yii::t('landing', 'Free') ?></strong>
                        <ul>
                            <li class="value">
                            	<span class="price"><sup><?= Yii::t('landing', 'moeda') ?></sup>0</span>
                            	<br />
                            	<small><sub><?= Yii::t('landing', 'Gratis, nenhum cartao requerido') ?></sub></small>
                            	<br />
                            	<br />
                            	<a href="#features" class="button button-buy"><?= Yii::t('landing', 'Testar') ?></a>
                            </li>
                            <li><i class="icon-check icon-large"></i></li>
                            <li>1 <?= Yii::t('landing', 'Canvas de Modelo') ?><br /><?= Yii::t('landing', 'de Negocios') ?></li>
                            <li>1 <?= Yii::t('landing', 'Lean Model Canvas') ?></li>
                            <li><?= Yii::t('landing', 'Assistente de criacao') ?></li>
                            <li><?= Yii::t('landing', 'Impressao em modo grafico e texto') ?></li>
                            <li><?= Yii::t('landing', 'Slideshow 3D') ?></li>
                            <li><?= Yii::t('landing', 'Disponivel em Portugues, Ingles e Espanhol') ?></li>
                            <li><?= Yii::t('landing', 'Post-its ilimitados por bloco') ?></li>
                            <li><?= Yii::t('landing', 'Post-its em 4 cores distintas') ?></li>
                            <li><?= Yii::t('landing', 'Compartilhamento com um amigo') ?></li>
                            <li><?= Yii::t('landing', 'Armazenamento na nuvem') ?></li>
                            <li><?= Yii::t('landing', 'Compativel com computadores e smartphones') ?></li>
                            <li><?= Yii::t('landing', 'Sincronizacao automatica entre dispositivos') ?></li>
                        </ul>
                    </div>
                </div>
                <div class="span4">
                    <div class="price-item price-item-top">
                        <strong class="price-title"><?= Yii::t('landing', 'Premium') ?></strong>
                        <ul>
                            <li class="value">
                            	<span class="price">
                            		<sup><?= Yii::t('landing', 'moeda') ?></sup>
                            		<?= Yii::t('landing', 'valor') ?>
                            	</span> 
                            	<br />
                            	<?php /* 
                            	<small>
                            		<sub>
                            			<?= Yii::t('landing', 'Cobrados anualmente, R$ {valor} mes a mes', ['valor' => '9,99']) ?>
                            		</sub>
                            	</small>
                            	*/ ?>
                            	<small><sub><?= Yii::t('landing', 'Assinar') ?> <?= Yii::t('landing', '12 meses') ?></sub></small>
                            	<br />
                            	<br />
                            	<a href="#features" class="button button-buy"><?= Yii::t('landing', 'Testar') ?></a>
                            </li>
                            <li><i class="icon-check icon-large"></i></li>
                            <li><?= Yii::t('landing', 'Canvas de Modelo de Negocios') ?><br /><strong><?= Yii::t('landing', 'ilimitados') ?></strong></li>
                            <li><?= Yii::t('landing', 'Lean Model Canvas') ?> <strong><?= Yii::t('landing', 'ilimitados') ?></strong></li>
                            <li><?= Yii::t('landing', 'Assistente de criacao') ?></li>
                            <li><?= Yii::t('landing', 'Impressao em modo grafico e texto') ?></li>
                            <li><?= Yii::t('landing', 'Slideshow 3D') ?></li>
                            <li><?= Yii::t('landing', 'Disponivel em Portugues, Ingles e Espanhol') ?></li>
                            <li><?= Yii::t('landing', 'Post-its ilimitados por bloco') ?></li>
                            <li><?= Yii::t('landing', 'Post-its em 4 cores distintas') ?></li>
                            <li><?= Yii::t('landing', 'Compartilhamento com um amigo') ?></li>
                            <li><?= Yii::t('landing', 'Armazenamento na nuvem') ?></li>
                            <li><?= Yii::t('landing', 'Compativel com computadores e smartphones') ?></li>
                            <li><?= Yii::t('landing', 'Sincronizacao automatica entre dispositivos') ?></li>
                        </ul>
                    </div>
                </div>
                <div class="span4 space-limit">
                    <h3>
                    	<?= Yii::t('landing', 'Assinatura contempla a utilizacao do') ?> 
                    	<strong><?= Yii::t('landing', 'Canvas de Modelo de Negocios') ?></strong> 
                    	<?= Yii::t('landing', 'e') ?> <strong><?= Yii::t('landing', 'Lean Model Canvas') ?></strong>
                    </h3>
                    <p><?= Yii::t('landing', 'Cadastre-se e comece a construir modelos canvas agora mesmo!') ?></p>
                </div>
            </div>
        </section>
    </div>
    <!-- End Pricing section -->

    <!-- Start Contact section -->
    <div id="contact" class="contact-section">
        <section class="section clearfix">
            <div class="row-fluid text-center">
                <div class="span8 offset2">
                    <h2 class="title"><?= Yii::t('landing', 'Contato') ?></h2>
                    <p>
                    	<?= Yii::t('landing', 'Em caso de duvidas ou sugestoes utilize o formulario abaixo para nos contatar.') ?>
                    	<br />
                    	<?= Yii::t('landing', 'Entraremos em contato em breve.') ?>
                    </p>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <form class="form" action="" id="contact-us-form">
                        <h4><?= Yii::t('landing', 'Escreva para nos') ?></h4>
                        <div class="row-fluid">
                            <div class="span6">
                                <div>
                                    <input class="span12 input-text required-field" type="text" name="contactName" 
                                    	id="contactName" placeholder="<?= Yii::t('landing', 'Nome') ?>" 
                                    	title="<?= Yii::t('landing', 'Nome') ?>" />
                                </div>
                                <div>
                                    <input class="span12 input-text required-field email-field" type="email" name="contactEmail" 
                                    	id="contactEmail" placeholder="<?= Yii::t('landing', 'Email') ?>" 
                                    	title="<?= Yii::t('landing', 'Email') ?>" />
                                </div>
                                <div>
                                    <input class="span12 input-text required-field" type="text" name="contactSubject" 
                                    	id="contactSubject" placeholder="<?= Yii::t('landing', 'Assunto') ?>" 
                                    	title="<?= Yii::t('landing', 'Assunto') ?>" />
                                </div>
                            </div>
                            <div class="span6">
                                <div>
                                    <textarea class="span12 input-text required-field" name="contactMessage" 
                                    	id="contactMessage" placeholder="<?= Yii::t('landing', 'Mensagem') ?>" 
                                    	title="<?= Yii::t('landing', 'Mensagem') ?>"></textarea>
                                </div>
                                <input class="span12 button" type="submit" value="<?= Yii::t('landing', 'Enviar') ?>" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <!-- End Contact section -->