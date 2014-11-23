<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemCanvas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-canvas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_projeto_canvas')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => 3]) ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cor')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'data_criacao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('item_canvas', 'Create') : Yii::t('item_canvas', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
