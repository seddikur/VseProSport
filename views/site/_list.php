<?php
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */

?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => "{items}\n{pager}",
    'itemView' => '_task_List',
]) ?>