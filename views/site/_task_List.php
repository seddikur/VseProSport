<?php

/* @var $this yii\web\View */
/* @var $model \app\models\Task */

use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to(['task', 'id' =>$model->id]);
?>


<div class="card">
    <div class="card-body">
    <h5 class="card-title">
    <a href="<?= Html::encode($url) ?>"><?= Html::encode($model->title) ?></a>
        </h5>
        <p><?= Yii::$app->formatter->asNtext($model->description) ?></p>
        <a href="#" class="btn btn-primary btn-sm">Learn More</a>
    </div>
</div>

