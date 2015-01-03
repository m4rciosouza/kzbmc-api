<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoCanvasCompartilhado */

$this->title = Yii::t('projeto_canvas_compartilhado', 'Update {modelClass}: ', [
    'modelClass' => 'Projeto Canvas Compartilhado',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('projeto_canvas_compartilhado', 'Projeto Canvas Compartilhados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('projeto_canvas_compartilhado', 'Update');
?>
<div class="projeto-canvas-compartilhado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
