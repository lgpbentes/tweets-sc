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

$this->title = 'Contas';
$this->params['breadcrumbs'][] = $this->title;
$contas = \common\models\Account::find()->all();
?>
<div class="account-index">
    <div class="w3-row-padding w3-margin-bottom">

            <?php
            if (Yii::$app->user->identity->username == "admin"){
                echo Html::a('Nova Conta', ['create'], ['class' => 'btn btn-success']);
            }
            ?>

        <br><br>

        <ul style="list-style-type:none">

            <?php
            foreach ($contas as $conta1){
                $conta = (json_decode($conta1->user_json));
                ?>

                <li>
                    <a href="index.php?r=account/view&id=<?=$conta1->id?>">
                    <div class="col-md-4">
                        <div class="media">
                            <div class="media-left waves-light">
                                <img class="w3-circle" src="<?= $conta->profile_image_url ?>" alt="Generic placeholder image">
                                <br><br>
                                <button class="btn btn-info btn-xs">Avalie!</button>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?= $conta->name ?></h4>
                                <p>@<?=$conta->screen_name?></p>
                                <p><?=number_format($conta->followers_count)?> seguidores</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    </a>

                </li>

                <?php
            }
            ?>


        </ul>
    </div>
</div>