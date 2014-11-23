<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemCanvasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-canvas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_projeto_canvas') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'descricao') ?>

    <?php // echo $form->field($model, 'cor') ?>

    <?php // echo $form->field($model, 'data_criacao') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('item_canvas', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('item_canvas', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
