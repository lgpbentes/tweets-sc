<?php

/* @var $this yii\web\View */

$this->title = 'Ferramenta de Avaliação';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
    body {font-family: "Open Sans"}
</style>
<body class="w3-light-grey">

<!-- Navigation bar

<!-- w3-content defines a container for fixed size centered content,
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-48 w3-white">
        <h1 class="w3-xxxlarge"><b>Ferramenta de Avaliação</b></h1>
        <h6>Bem-vindo ao <span class="w3-tag">Mundo dos bots</span></h6>
    </header>

    <!-- Image header -->
    <header class="w3-display-container w3-wide" id="home">
        <img class="w3-image" src="img/capa.jpg" alt="Bot tweet" width="1600" height="1060">
        <div class="w3-display-left w3-padding-xlarge">


            <h1 class="w3-jumbo w3-text-white w3-hide-small"><b>5 FORMAS DE DETECTAR UM BOT</b></h1>

        </div>
    </header>

    <!-- Grid -->
    <div class="w3-row w3-padding w3-border">

        <!-- Blog entries -->
        <div class="w3-col l8 s12">

            <!-- Blog entry -->
            <div class="w3-container w3-white w3-margin w3-padding-large">
                <div class="w3-center">
                    <h3>#1: Foto/Username estranho</h3>
                </div>

                <div class="w3-justify">
                    <p><strong></strong> Existem muitas formas de detectar um bot no Twitter, mas a forma mais fácil é olhar para a composição de uma conta falsa. Isso inclui uma foto ruim, não clara ou sem rostos. Se existe um rosto, então há uma boa chance de ser um homem ou mulher atrante. Além disso, se o nome de usuário não bate com a foto, nome ou marca - é uma conta falsa. </p>
                </div>
            </div>
            <hr>
            <!-- Blog entry -->
            <div class="w3-container w3-white w3-margin w3-padding-large">
                <div class="w3-center">
                    <h3>#2: Poucos tweets e URL's suspeitas</h3>
                </div>

                <div class="w3-justify">
                    <p>A maioria dos <strong>bots do Twitter</strong> são descobertos pouco depois que as pessoas os seguem, o que significa que sempre têm um grande número de pessoas que seguem, mas com muito poucos tweets realmente publicados diariamente. As URLs também são suspeitas e levam a sites de spam. É preciso sempre checar a URL das pessoas que você segue, para verificar a credibilidade da conta</p>
                </div>
            </div>
            <hr>

            <!-- Blog entry -->
            <div class="w3-container w3-white w3-margin w3-padding-large">
                <div class="w3-center">
                    <h3>#3: Proporção estranha de Seguindo/Seguidores</h3>
                </div>

                <div class="w3-justify">
                    <p>Há milhares de celebridades e autoridades que tem contas gigantes, com uma proporção que excede 10:1. Mas é extremamente incomum para qualquer um que não é famoso alcançar essas proporções. Você pode apostar que se você se deparar com um estranho no Twitter com uma proporção de 10:1 - essa conta é provavelmente um bot spam.</p>

                    <p>É sempre bom checar o feed da conta primeiro =) </p>
                </div>
            </div>
            <hr>
            <!-- Blog entry -->
            <div class="w3-container w3-white w3-margin w3-padding-large">
                <div class="w3-center">
                    <h3>#4: Após publicação de um tweet</h3>
                </div>

                <div class="w3-justify">
                    <p>Você é seguido por alguém <strong>segundos depois de publicar um tweet</strong>, a resposta indica o uso de um programa de automação que busca certas palavras-chave. Não o siga de volta. Pessoas envolvidas com marketing confirmam identidade via mensagem direta.</p>

                </div>
            </div>
            <hr>

            <!-- Blog entry -->
            <div class="w3-container w3-white w3-margin w3-padding-large">
                <div class="w3-center">
                    <h3>#5: API’s e Repetição</h3>
                </div>

                <div class="w3-justify">
                    <p>Finalmente, se você observa que o tweet foi publicado por uma API e parece suspeito - então é um bot. Pessoas reais geralmente publicam via desktop ou dispositivos móveis, não sistemas de API. Observe o que a pessoa publica, se ela repete as mesmas coisas frequentemente, deve ser um bot.</p>

                </div>
            </div>
            <hr>

            <!-- END BLOG ENTRIES -->
        </div>

        <!-- About/Information menu -->
        <div class="w3-col l4">
            <!-- About Card -->
            <hr>


            <!-- Advertising -->

            <hr>


            <div class="w3-white w3-margin">
                <div class="w3-container w3-padding w3-black">
                </div>
                <div class="w3-container w3-white">
                    <h6><button onclick="window.location.href='index.php?r=account%2Findex'" class="w3-btn w3-white w3-padding-large w3-large w3-opacity w3-hover-opacity-off">Começar!</button></h6>
                </div>


            </div>

            <!-- Inspiration -->

            <hr>


            <hr>

            <!-- Subscribe -->


            <!-- END About/Intro Menu -->
        </div>

        <!-- END GRID -->
    </div>

    <!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-padding-xlarge">
    <a href="" class="w3-btn w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>Para cima</a>
</footer>

</body>

