<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoCanvasCompartilhadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projeto-canvas-compartilhado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_projeto_canvas') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('projeto_canvas_compartilhado', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('projeto_canvas_compartilhado', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
