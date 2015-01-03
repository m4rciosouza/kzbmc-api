<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoCanvasCompartilhado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projeto-canvas-compartilhado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_projeto_canvas')->textInput() ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('projeto_canvas_compartilhado', 'Create') : Yii::t('projeto_canvas_compartilhado', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
