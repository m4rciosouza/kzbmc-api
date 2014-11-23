<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = Yii::t('usuario', 'Update {modelClass}: ', [
    'modelClass' => 'Usuario',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('usuario', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('usuario', 'Update');
?>
<div class="usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
