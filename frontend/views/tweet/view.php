<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tweet */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tweets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$obj = json_decode($model->content);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tweets</title>
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Multi Column Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/skycons.js"></script>
</head>
<body>
<div class="main-agileits">

    <div class="profile-agile">
        <!--<div class="w3layouts" style="background:url(<?=$obj->user->profile_banner_url ?>) no-repeat 0px 0px;">-->
        <div class="w3layouts" >
            <img src="<?=$obj->user->profile_image_url?>" alt=" " />
            <h3><?= $obj->user->name ?></h3>
            <label class="line"></label>
            <?php

                $data = new DateTime($obj->user->created_at);
                echo "<p>Ativo desde: " . $data->format('d-m-Y') . "</p>";
            ?>
            <label class="line"></label>
            <p><?=$obj->user->description?></p>
        </div>
        <div class="agileits-w3layouts">
            <div class="w3l">
                <h4><?=$obj->user->followers_count?></h4>
                <h5>Seguidores</h5>
            </div>
            <div class="w3-agile">
                <h4><?=$obj->user->statuses_count ?></h4>
                <h5>Tweets</h5>
            </div>
            <div class="clear"></div>
            <div class="w3layouts" style="background-color: white">
                <h4><?=$obj->text?></h4>
            </div>
            <div class="clear"></div>
            <div id="av">
                <h3 align="center">Bot?</h3>
                <div class="w3-agile">
                    <button class="btn-danger" onclick="verdadeiro(<?=$model->id?>)">Sim</button>
                </div>
                <div class="w3-agile">
                    <button class="btn-primary" onclick="falso(<?=$model->id?>)">Não</button>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="footer-agileits-w3layouts">
    <p class="agileinfo"> &copy; 2016 ICOMP</p>
</div>
</body>

<script>
    function verdadeiro(id) {
        $.get('index.php?r=tweet/verdadeiro&id='+id, function (dados) {
            console.log(dados)
            document.getElementById("av").style.visibility = "hidden";        });
    }
    
    function falso(id) {
        $.get('index.php?r=tweet/falso&id='+id, function (dados) {
            console.log(dados);
            document.getElementById("av").style.visibility = "hidden";
        });
    }

</script>

</html>