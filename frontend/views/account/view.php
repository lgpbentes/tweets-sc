<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Account */

$this->title = "@".$model->username;
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->username;
//print_r($model->user_json);
$user_json = json_decode($model->user_json);

?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
            <!-- Profile -->
            <div class="w3-card-2 w3-round w3-white">
                <div class="w3-container">
                    <h4 class="w3-center"><?="@".$model->username?></h4>
                    <p class="w3-center"> <img src="<?=$user_json->profile_image_url?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                    <p class="w3-center">
                    <div class="w3-half">
                        <button class="w3-btn w3-green w3-btn-block w3-section" title="É um BOT"><i class="fa fa-check"></i></button>
                    </div>
                    <div class="w3-half">
                        <button class="w3-btn w3-red w3-btn-block w3-section" title="Não é um BOT"><i class="fa fa-remove"></i></button>
                    </div>
                    <hr>
                    <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?= $user_json->description?></p>
                    <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?=$user_json->location?></p>
                    <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> Created at <?=date_format(date_create($user_json->created_at), 'Y-m-d')?></p>
                </div>
            </div>
            <br>
            <!-- Alert Box -->
            <div class="w3-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-hover-text-grey w3-closebtn">
          <i class="fa fa-remove"></i>
        </span>
                <p><strong>Hey!</strong></p>
                <p>Analise e Descubra se essa conta é um bot!</p>
            </div>
            <!-- Accordion -->
            <div class="w3-card-2 w3-round">
                <div class="w3-accordion w3-white">
                    <button class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil fa-fw w3-margin-right"></i><?=$user_json->statuses_count?> tweets</button>

                    <button class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>Following <?=$user_json->friends_count?></button>

                    <button class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> <?=$user_json->followers_count?> followers</button>

                </div>
            </div>
            <br>

            <div class="w3-card-2 w3-round">
                <div class="w3-accordion w3-white">
                    <button class="w3-btn-block  w3-left-align"><i class="fa fa-download fa-fw w3-margin-right"></i><a href="index.php?r=account/retrieve&screen_name=<?=$user_json->screen_name?>&count=5&account_id=<?=$model->id?>">Recuperar tweets</a></button>

                </div>
            </div>
            <br>

            <!-- End Left Column -->
        </div>

        <!-- Middle Column -->
        <div class="w3-col m7">

            <?php
            $tweets = $model->getTweets()->all();

            foreach($tweets as $tweet){
                $tweet = json_decode($tweet->content);
            ?>
                <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
                    <img src="<?=$user_json->profile_image_url?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px; height: 60px">
                    <span class="w3-right w3-opacity"><?=date_format(date_create($tweet->created_at), 'Y-m-d H:i')?></span>
                    <h4><?="@".$model->username?></h4><br>
                    <hr class="w3-clear">
                    <p><?=$tweet->text?></p>
                </div>
            <?php
            }
            ?>
            <!-- End Middle Column -->
        </div>


        <!-- End Grid -->
    </div>

    <!-- End Page Container -->
</div>

</body>
</html>
