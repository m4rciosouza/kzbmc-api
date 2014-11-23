<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoCanvas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projeto-canvas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => 50]) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'ativo')->textInput(['maxlength' => 1]) ?>

    <?= $form->field($model, 'data_criacao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('projeto_canvas', 'Create') : Yii::t('projeto_canvas', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
