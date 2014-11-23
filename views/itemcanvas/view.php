<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ItemCanvas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('item_canvas', 'Item Canvas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-canvas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('item_canvas', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('item_canvas', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('item_canvas', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_projeto_canvas',
            'tipo',
            'titulo',
            'descricao:ntext',
            'cor',
            'data_criacao',
        ],
    ]) ?>
    
    <h2><?= Yii::t('projeto_canvas', 'Projeto Canvas') ?></h2>
    
    <?= DetailView::widget([
        'model' => $model->projeto_canvas,
        'attributes' => [
            'id',
            'id_usuario',
            'nome',
            'descricao',
            'ativo',
            'data_criacao',
        ],
    ]) ?>

</div>
