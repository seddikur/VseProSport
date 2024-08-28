<?php

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= $this->render('_list', [
        'dataProvider' => $dataProvider
    ]) ?>

<!--    --><?php //= \yii\widgets\ListView::widget([
//        'model' => $dataProvider,
//        'attributes' => [
//            'title',
//            'description',
//            'due_date:datetime',
//            'status',
//            'priority',
//        ],
//    ]);?>


</div>
