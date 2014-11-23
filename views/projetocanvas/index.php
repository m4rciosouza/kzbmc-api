<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjetoCanvasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('projeto_canvas', 'Projeto Canvas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-canvas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('projeto_canvas', 'Create {modelClass}', [
    'modelClass' => 'Projeto Canvas',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
