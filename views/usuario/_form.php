<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'senha')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'ativo')->textInput(['maxlength' => 1]) ?>

    <?= $form->field($model, 'lingua')->textInput(['maxlength' => 2]) ?>

    <?= $form->field($model, 'data_criacao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('usuario', 'Create') : Yii::t('usuario', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
