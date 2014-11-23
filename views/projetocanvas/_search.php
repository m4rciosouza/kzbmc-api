<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoCanvasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projeto-canvas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'ativo') ?>

    <?php // echo $form->field($model, 'data_criacao') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('projeto_canvas', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('projeto_canvas', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
