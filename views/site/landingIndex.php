<?php
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'KAZ-Canvas');
?>
	<!-- Start Home section -->
    <div id="home" class="home-section">
        <section class="section clearfix">
            <div id="homeCarousel" class="slider">
                <ul class="slides">
                    <li class="slide row-fluid">
                        <div class="span8 offset4">
                            <img src="http://placehold.it/960x860" height="860" width="960" 
                            	alt="<?= Yii::t('landing', 'Solucao completa para criacao de modelos canvas') ?>" />
                        </div>
                        <div class="slide-caption">
                            <h2><?= Yii::t('landing', 'Solucao completa para criacao de modelos canvas') ?></h2>
                            <a href="#features" class="button button-buy">Testar</a>
                        </div>
                    </li>
                    <li class="slide right-dir row-fluid">                        
                        <div class="span8">
                            <img src="http://placehold.it/960x860" height="860" width="960" alt="Canvas de Modelo de Negócios" />
                        </div>
                        <div class="slide-caption">
                            <h2>Canvas de Modelo de Negócios</h2>
                            <a href="#features" class="button button-buy">Testar</a>
                        </div>
                    </li>
                    <li class="slide row-fluid">
                        <div class="span8 offset4">
                            <img src="http://placehold.it/960x860" height="860" width="960" alt="Lean Model Canvas" />
                        </div>
                        <div class="slide-caption">
                            <h2>Lean Model Canvas</h2>
                            <a href="#features" class="button button-buy">Testar</a>
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
                    		Canvas de Modelo<br /> de Negócios
                    	</a>
                    </h3>
                    <p>
                    	<a href="http://businessmodel.kazcanvas.com" target="_blank">
                    		Ferramenta de criação de Canvas de Modelo de Negócios online.
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
                    		Lean Model<br /> Canvas
                    	</a>
                    </h3>
                    <p>
                    	<a href="http://leanmodel.kazcanvas.com" target="_blank">
                    		Ferramenta de criação de Lean Model Canvas online.
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
                    <h2 class="title">Características</h2>
                    <p>
                    	Abaixo seguem as principais características encontradas em ambos aplicativos, o Business Model Canvas e 
                    	o Lean Model Canvas:
                    </p>
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
                        <figcaption><span>Assistente de criação</span></figcaption>
                    </figure>
                </article>
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-print"></i>
		                    </div>
                        </span>
                        <figcaption><span>Impressão em modo gráfico e texto</span></figcaption>
                    </figure>
                </article>
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-desktop"></i>
		                    </div>
                        </span>
                        <figcaption><span>Slideshow 3D</span></figcaption>
                    </figure>
                </article>
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-th"></i>
		                    </div>
                        </span>
                        <figcaption><span>Post-its ilimitados por bloco, e em 4 cores distintas</span></figcaption>
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
                        <figcaption><span>Compartilhamento com um amigo</span></figcaption>
                    </figure>
                </article>
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-cloud-upload"></i>
		                    </div>
                        </span>
                        <figcaption><span>Armazenamento na nuvem com sincronização automática entre dispositivos</span></figcaption>
                    </figure>
                </article>
                
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-tablet"></i>
		                    </div>
                        </span>
                        <figcaption><span>Compatível com computadores e smartphones</span></figcaption>
                    </figure>
                </article>
                <article class="span3 team-item">
                    <figure>
                        <span class="team-img">
                        	<div class="thumb" style="margin-bottom: 0; background: #FFF">
		                       	<i class="icon-globe"></i>
		                    </div>
                        </span>
                        <figcaption><span>Disponível em Português, Inglês e Espanhol</span></figcaption>
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
                    <h2 class="title">Galeria</h2>
                    <p>Confira algumas imagens do aplicativo:</p>
                </div>
            </div>
            <div class="gallery-list">
                <div class="row-fluid">
                    <figure class="span4">
                        <a href="http://placehold.it/750x500.jpg">
                            <img src="http://placehold.it/750x500" alt="Title" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                    <figure class="span4">
                        <a href="http://placehold.it/750x500.jpg">
                            <img src="http://placehold.it/750x500" alt="Title" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                    <figure class="span4">
                        <a href="http://placehold.it/750x500.jpg">
                            <img src="http://placehold.it/750x500" alt="Title" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                </div>
                <div class="row-fluid">
                    <figure class="span4">
                        <a href="http://placehold.it/750x500.jpg">
                            <img src="http://placehold.it/750x500" alt="Title" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                    <figure class="span4">
                        <a href="http://placehold.it/750x500.jpg">
                            <img src="http://placehold.it/750x500" alt="Title" height="500" width="750" />
                        </a>
                        <span class="overlay"></span>
                    </figure>
                    <figure class="span4">
                        <a href="http://placehold.it/750x500.jpg">
                            <img src="http://placehold.it/750x500" alt="Title" height="500" width="750" />
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
                        <strong class="price-title">Free</strong>
                        <ul>
                            <li class="value">
                            	<span class="price"><sup>R$</sup>0</span>
                            	<br />
                            	<small><sub>Grátis, nenhum cartão requerido</sub></small>
                            	<br />
                            	<br />
                            	<a href="#features" class="button button-buy">Testar</a>
                            </li>
                            <li><i class="icon-check icon-large"></i></li>
                            <li>1 Canvas de Modelo de<br /> Negócios</li>
                            <li>1 Lean Model Canvas</li>
                            <li>Assistente de criação</li>
                            <li>Impressão em modo gráfico/texto</li>
                            <li>Slideshow 3D</li>
                            <li>Disponível em Português, Inglês e Espanhol</li>
                            <li>Post-its ilimitados por bloco</li>
                            <li>Post-its em 4 cores distintas</li>
                            <li>Compartilhamento com um amigo</li>
                            <li>Armazenamento na nuvem</li>
                            <li>Compatível com computadores e smartphones</li>
                            <li>Sincronização automática entre dispositivos</li>
                        </ul>
                    </div>
                </div>
                <div class="span4">
                    <div class="price-item price-item-top">
                        <strong class="price-title">Premium</strong>
                        <ul>
                            <li class="value">
                            	<span class="price"><sup>R$</sup>7,99</span> Mensais
                            	<br />
                            	<small><sub>Cobrados anualmente, R$ 9,99 mês a mês</sub></small>
                            	<br />
                            	<br />
                            	<button class="button button-buy">Assinar</button>
                            </li>
                            <li><i class="icon-check icon-large"></i></li>
                            <li>Canvas de Modelo de Negócios <strong>ilimitados</strong></li>
                            <li>Lean Model Canvas <strong>ilimitados</strong></li>
                            <li>Assistente de criação</li>
                            <li>Impressão em modo texto</li>
                            <li>Slideshow 3D</li>
                            <li>Disponível em Português, Inglês e Espanhol</li>
                            <li>Post-its ilimitados por bloco</li>
                            <li>Post-its em 4 cores distintas</li>
                            <li>Compartilhamento com um amigo</li>
                            <li>Armazenamento na nuvem</li>
                            <li>Compatível com computadores e smartphones</li>
                            <li>Sincronização automática entre dispositivos</li>
                        </ul>
                    </div>
                </div>
                <div class="span4 space-limit">
                    <h3>Assinatura contempla a utilização do <strong>Canvas de Modelo de Negócios</strong> e <strong>Lean Model Canvas</strong></h3>
                    <p>Cadastre-se e comece a construir modelos canvas agora mesmo!</p>
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
                    <h2 class="title">Contato</h2>
                    <p>
                    	Em caso de dúvidas ou sugestões utilize o formulário abaixo para nos contatar.
                    	<br />
                    	Entraremos em contato em breve.
                    </p>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <form class="form" action="" id="contact-us-form">
                        <h4>Escreva para nós</h4>
                        <div class="row-fluid">
                            <div class="span6">
                                <div>
                                    <input class="span12 input-text required-field" type="text" name="contactName" 
                                    	id="contactName" placeholder="Nome" title="Nome" />
                                </div>
                                <div>
                                    <input class="span12 input-text required-field email-field" type="email" name="contactEmail" 
                                    	id="contactEmail" placeholder="Email" title="Email" />
                                </div>
                                <div>
                                    <input class="span12 input-text required-field" type="text" name="contactSubject" 
                                    	id="contactSubject" placeholder="Assunto" title="Assunto" />
                                </div>
                            </div>
                            <div class="span6">
                                <div>
                                    <textarea class="span12 input-text required-field" name="contactMessage" 
                                    	id="contactMessage" placeholder="Mensagem" title="Mensagem"></textarea>
                                </div>
                                <input class="span12 button" type="submit" value="Enviar" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <!-- End Contact section -->

<?php /* 
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Yii::t('app', 'KAZ-Canvas'); ?></h1>
		<br />
		<p class="lead"><?= Yii::t('app', 'Selecione um modelo para iniciar!'); ?></p>
		<br />
        <p>
        	<a class="btn btn-lg btn-success" style="width: 350px;"
        		href="http://businessmodel.kazcanvas.com">
        		<?= Yii::t('app', 'Canvas de Modelo de Negocios'); ?>
        	</a>
        </p>
        <p>
        	<a class="btn btn-lg btn-success" style="width: 350px;"
        		href="http://leanmodel.kazcanvas.com">
        		<?= Yii::t('app', 'Lean Model Canvas'); ?>
        	</a>
        </p>
    </div>
</div>
*/ ?>