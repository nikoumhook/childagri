<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= $this->e($title) ?></title>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/knacss.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('owl-carousel/owl.theme.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('owl-carousel/owl.transitions.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('owl-carousel/owl.carousel.css') ?>">

        <!-- import des fichiers css meta et script si besoin  -->
        <?= $this->section('head') ?>

        <link rel="stylesheet" href="<?= $this->assetUrl('css/interface.css') ?>">
        <style media="screen">
            .already{
                background-color: black;
            }
        </style>
    </head>
    <body>

        <!-- <div class="debug pam">
            <pre>
                <php var_dump($_SESSION); ?>
            </pre>
        </div> -->


        <!-- CONTENU  ************///////////////////////////////:******************* -->
        <main>
            <?= $this->section('main_content') ?>
        </main>
        <!-- BOUTON PERMANENTS ************///////////////////////////////:******************* -->
        <div id="navDeco">
            <div class="decoMenu pam">
                MENU
                <ul class="decoSubmenu">
                    <li><a class="pas" href="<?= $this->url('game_reset') ?>">Reset</a></li>
                    <li><a class="pas" href="<?= $this->url('game_quit') ?>">Deco</a></li>
                </ul>
            </div>
        </div>
        <?php if ($w_current_route != 'game_quizz'): ?>
            <div id="navTrophee" class="pam">
                <?php if (!empty($_SESSION['save']['id_quizz'])): ?>
                    <div class="containerBulle">
                        <div id="bulle" class="">
                            <a href="<?= $this->url('game_quizz') ?>">Ont joue au QUIZZ ?</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $this->insert('front/intestin'); ?>
            </div>
        <?php endif; ?>
        <!-- BOUTON PERMANENTS ************///////////////////////////////:******************* -->


        <!-- BOUTON POUR ASSIETTE ************///////////////////////////////:******************* -->
        <?php
        $carte=''; ?>

        <?php if ($w_current_route == 'game_assiette'): ?>

            <?php if (isset($carte)): ?>
                <div id="navTopBar">
                    <!-- le contenu ici est remplacé par jQuery quand un repas est selectionné ! -->
                    <div class="pal">
                        MERCI DE CHOISIR UN REPAS !
                    </div>
                </div>
            <?php endif; ?>



            <div id="navLeftBar">
                <ul>
                    <li id="repas1" class="circle <?= (empty($repas) || !in_array(1,$repas))? 'obsRepas' : 'repasFait' ?>">P'tit Dej </li>
                    <li id="repas2" class="circle <?= (empty($repas) || !in_array(2,$repas))? 'obsRepas' : 'repasFait' ?>">Repas Midi</li>
                    <li id="repas3" class="circle <?= (empty($repas) || !in_array(3,$repas))? 'obsRepas' : 'repasFait' ?>">Goutter</li>
                    <li id="repas4" class="circle <?= (empty($repas) || !in_array(4,$repas))? 'obsRepas' : 'repasFait' ?>">Le Soir</li>
                </ul>
            </div>
        <?php endif; ?>

        <!-- FIN BOUTON POUR ASSIETTE ************///////////////////////////////:******************* -->

        <!-- BOUTON POUR CARTE  ************///////////////////////////////:******************* -->
        <?php if ($w_current_route == 'game_carte'): ?>

            <?php if (isset($_SESSION['save']['id_quizz']) && count(explode(',',$_SESSION['save']['id_quizz'])) < 12): ?>
                <div id="navReturn" class="pam">
                    <a href="<?= $this->url('game_assiette') ?>">
                        <img class="btn-back" src="<?= $this->assetUrl('/img/assiette_petitDej.svg') ?>" alt="retour">
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>


        <!-- INCLUSION JAVASCRIPT  ************///////////////////////////////:******************* -->
            <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
            <script src="<?= $this->assetUrl('owl-carousel/owl.carousel.min.js') ?>"></script>

            <?= $this->section('script') ?>
        <!-- FIN INCLUSION JAVASCRIPT  ************///////////////////////////////:******************* -->
        <script type="text/javascript">
        $(function(){

            var intestinFn;
            var nBrDeRepasPris;
            intestinFn = function(){
                $("#intestinEtape<?= (!empty($repas)? count($repas) : '99'); ?>").show();
            };
            // appel de la fonction
            intestinFn();

            // menu deco
            $('.decoMenu').click(function(){
                $('.decoSubmenu').toggle();
            });



        });
        </script>
    </body>
</html>
