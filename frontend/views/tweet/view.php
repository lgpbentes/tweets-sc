<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tweet */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tweets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tweet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'account_id1' => $model->account_id1], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'account_id1' => $model->account_id1], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content:ntext',
            'account_id1',
        ],
    ]) ?>

</div>
