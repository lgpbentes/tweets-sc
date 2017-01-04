<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">
    <div class="w3-row-padding w3-margin-bottom">

        <p>
            <?= Html::a('Nova Conta', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php /*Pjax::begin(); ?>    <?= GridView::widget(
            [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'photo_profile',
                'username',
                'bio',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);*/ ?>

        <?php Pjax::begin(); ?>    <?= GridView::widget(
            [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,

            'columns' => [
                [

                    'attribute' => 'img',
                    'format' => 'html',
                    'label' => 'Profile photo',
                    'value' => function ($data) {
                        return Html::img($data['photo_profile'],
                            ['width' => '60px']);
                    },

                ],
                
                'username',
                'bio',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <?php Pjax::end(); ?></div>


