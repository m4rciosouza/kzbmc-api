<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemCanvas */

$this->title = Yii::t('item_canvas', 'Update {modelClass}: ', [
    'modelClass' => 'Item Canvas',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('item_canvas', 'Item Canvas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('item_canvas', 'Update');
?>
<div class="item-canvas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
