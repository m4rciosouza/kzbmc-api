<?php
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'KZ-Canvas');
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Yii::t('app', 'KZ-Canvas'); ?></h1>
		<br />
		<p class="lead"><?= Yii::t('app', 'Selecione um modelo para iniciar!'); ?></p>
		<br />
        <p>
        	<a class="btn btn-lg btn-success" style="width: 350px;"
        		href="http://businessmodel.kzcanvas.com">
        		<?= Yii::t('app', 'Canvas de Modelo de Negocios'); ?>
        	</a>
        </p>
        <p>
        	<a class="btn btn-lg btn-success" style="width: 350px;"
        		href="http://leancanvas.kzcanvas.com">
        		<?= Yii::t('app', 'Lean Model Canvas'); ?>
        	</a>
        </p>
    </div>
</div>