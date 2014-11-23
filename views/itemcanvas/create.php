<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ItemCanvas */

$this->title = Yii::t('item_canvas', 'Create {modelClass}', [
    'modelClass' => 'Item Canvas',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('item_canvas', 'Item Canvas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-canvas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
