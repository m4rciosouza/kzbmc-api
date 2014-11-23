<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\ItemCanvasSearch;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoCanvas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('projeto_canvas', 'Projeto Canvas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-canvas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('projeto_canvas', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('projeto_canvas', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('projeto_canvas', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_usuario',
            'nome',
            'descricao',
            'ativo',
            'data_criacao',
        ],
    ]) ?>
    
    <h2><?= Yii::t('projeto_canvas', 'Usuario') ?></h2>
    
    <?= DetailView::widget([
        'model' => $model->usuario,
        'attributes' => [
            'id',
            'email',
            'lingua',
            'ativo',
            'data_criacao',
        ],
    ]) ?>
    
    <h2><?= Yii::t('projeto_canvas', 'Itens') ?></h2>
    
    <?php $itemCanvasSearch = new ItemCanvasSearch(); ?>
    <?= GridView::widget([
        'dataProvider' => $itemCanvasSearch->search(['ItemCanvasSearch' => ['id_projeto_canvas' => $model->id]]),
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'tipo',
            'titulo',
            'descricao',
            'cor',
            'data_criacao',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
