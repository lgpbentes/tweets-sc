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
use \common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TweetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ranking';
$this->params['breadcrumbs'][] = $this->title;

$users = User::find()->orderBy(["pontuacao"=> SORT_DESC])->all();
?>

<div class="tweet-index">
    <div class="w3-container">
        <h5></h5>
        <ul class="w3-ul w3-card-4 w3-white">
            <?php
            foreach ($users as $user){
            ?>
                <li class="w3-padding-16" width="60px;" >
                    <span class="w3-closebtn w3-padding w3-margin-right w3-medium"><?=$user->pontuacao?> pontos</span>
                    <?php
                    if($user->foto){
                        echo"<img src='$user->foto' class='w3-left w3-circle w3-margin-right' style='width:50px; height: 50px'>";
                    } else{
                        echo"<img src='users/fake.png' class='w3-left w3-circle w3-margin-right' style='width:50px; height: 50px'>";
                    }
                    ?>

                    <span class="w3-xlarge"><?=$user->username?></span><br>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>
    <hr>

</div>