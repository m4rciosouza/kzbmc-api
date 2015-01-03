<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjetoCanvasCompartilhadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('projeto_canvas_compartilhado', 'Projeto Canvas Compartilhados');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-canvas-compartilhado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('projeto_canvas_compartilhado', 'Create {modelClass}', [
    'modelClass' => 'Projeto Canvas Compartilhado',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_projeto_canvas',
            'id_usuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
