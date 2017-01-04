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
/* @var $searchModel common\models\TweetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ranking';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tweet-index">
  <div class="w3-container">
    <h5></h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16" width="60px;" >
        <span class="w3-closebtn w3-padding w3-margin-right w3-medium">1000 Pontos</span>
        <img src="img/roberto.jpg" class="w3-left w3-circle w3-margin-right" style="width:50px; height: 50px">
        <span class="w3-xlarge">Roberto Justus</span><br>
      </li>
      <li class="w3-padding-16" width="60px;" >
        <span class="w3-closebtn w3-padding w3-margin-right w3-medium">100 Pontos</span>
        <img src="img/temer.jpg" class="w3-left w3-circle w3-margin-right" style="width:50px; height: 50px">
        <span class="w3-xlarge">Michel Temer</span><br>
      </li>
      <li class="w3-padding-16" >
        <span class="w3-closebtn w3-padding w3-margin-right w3-medium">24 Pontos</span>
        <img src="img/bolsonaro.JPG" class="w3-left w3-circle w3-margin-right" style="width:50px; height: 50px">
        <span class="w3-xlarge">Jair Bolsonaro</span><br>
      </li>
      <li class="w3-padding-16">
        <span class="w3-closebtn w3-padding w3-margin-right w3-medium">0.1 Pontos</span>
        <img src="img/dilma.jpg" class="w3-left w3-circle w3-margin-right" style="width:50px; height: 50px">
        <span class="w3-xlarge">Dilma</span><br>
      </li>
      <li class="w3-padding-16">
        <span class="w3-closebtn w3-padding w3-margin-right w3-medium">0 Pontos</span>
        <img src="img/lula.jpg" class="w3-left w3-circle w3-margin-right" style="width:50px; height: 50px">
        <span class="w3-xlarge">Lula</span><br>
      </li>
    </ul>
  </div>
  <hr>

</div>
