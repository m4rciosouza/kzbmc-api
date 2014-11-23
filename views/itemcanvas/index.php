<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemCanvasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('item_canvas', 'Item Canvas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-canvas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('item_canvas', 'Create {modelClass}', [
    'modelClass' => 'Item Canvas',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_projeto_canvas',
            'tipo',
            'titulo',
            'descricao:ntext',
            // 'cor',
            // 'data_criacao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
