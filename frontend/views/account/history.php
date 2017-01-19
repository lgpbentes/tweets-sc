<?php


use \common\models\UserEvAccount;
use \common\models\Account;

$avaliacoes = UserEvAccount::find()->where(['user_id'=>Yii::$app->user->identity->getId()])->all();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
    <link href="css/history.css" rel="stylesheet">
</head>
<body>

<span class="first">
    <?=Yii::$app->user->identity->username?>
</span>

<ul class="timeline">
    <?php
    foreach($avaliacoes as $avaliacao){
        $conta = json_decode(Account::findOne(['id'=>$avaliacao->account_id])->user_json);

        $nconcordam = UserEvAccount::find()->where(['account_id'=>$avaliacao->account_id])->andWhere(['<>','bot',$avaliacao->bot])->count();
        $concordam = UserEvAccount::find()->where(['account_id'=>$avaliacao->account_id, 'bot'=>$avaliacao->bot])->count() - 1;

        ?>

        <li>
            <a href="index.php?r=account/view&id=<?=$avaliacao->account_id?>" >
            <div class="avatar">
                <img src="<?=$conta->profile_image_url?>">
                <div class="hover">
                    <div class="icon-twitter"></div>
                </div>
            </div>
            </a>
            <div class="bubble-container">
                <div class="bubble">
                    <h3>Você classificou @<?=$conta->screen_name?> como <?php if ($avaliacao->bot == 2) echo 'bot'; else echo 'não bot';?> </h3><br/>
                    </br>
                    <?=$concordam?> pessoa(s) concordam com você.
                    <?=$nconcordam?> pessoas não concordam


                </div>
                <div class="arrow"></div>
            </div>
        </li>

    <?php
    }
    ?>

</ul>

</body>
</html>