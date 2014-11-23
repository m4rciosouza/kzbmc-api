<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\ProjetoCanvasSearch;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('usuario', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('usuario', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('usuario', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('usuario', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'email:email',
            'senha',
            'ativo',
            'lingua',
            'data_criacao',
        ],
    ]) ?>
    
    <?php $projetoCanvasSearch = new ProjetoCanvasSearch(); ?>
    <?= GridView::widget([
        'dataProvider' => $projetoCanvasSearch->search(['ProjetoCanvasSearch' => ['id_usuario' => $model->id]]),
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_usuario',
            'nome',
            'descricao',
            'ativo',
            // 'data_criacao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
