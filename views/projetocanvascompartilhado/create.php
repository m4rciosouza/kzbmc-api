<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjetoCanvasCompartilhado */

$this->title = Yii::t('projeto_canvas_compartilhado', 'Create {modelClass}', [
    'modelClass' => 'Projeto Canvas Compartilhado',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('projeto_canvas_compartilhado', 'Projeto Canvas Compartilhados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-canvas-compartilhado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
