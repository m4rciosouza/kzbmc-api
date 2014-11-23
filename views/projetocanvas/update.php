<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoCanvas */

$this->title = Yii::t('projeto_canvas', 'Update {modelClass}: ', [
    'modelClass' => 'Projeto Canvas',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('projeto_canvas', 'Projeto Canvas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('projeto_canvas', 'Update');
?>
<div class="projeto-canvas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
