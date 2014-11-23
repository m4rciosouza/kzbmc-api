<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjetoCanvas */

$this->title = Yii::t('projeto_canvas', 'Create {modelClass}', [
    'modelClass' => 'Projeto Canvas',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('projeto_canvas', 'Projeto Canvas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-canvas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
