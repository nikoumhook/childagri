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
        <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
        <style media="screen">
            .already{
                background-color: black;
            }
        </style>
    </head>
    <body>

        <!-- <div class="debug pam">
            <pre>
                <php ($_SESSION); ?>
            </pre>
        </div> -->


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
        <div id="navTrophee" class="pam">
            <?php if (!empty($_SESSION['save']['id_quizz'])): ?>
                Affiche la petite bubulle
            <?php endif; ?>
            image Intestinc
        </div>
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
            <div id="navReturn" class="pam">
                <a href="<?= $this->url('game_assiette') ?>">fleche de retour</a>
            </div>
        <?php endif; ?>
        <!-- FIN BOUTON POUR CARTE  ************///////////////////////////////:******************* -->

        <main>
            <?= $this->section('main_content') ?>
        </main>

        <!-- INCLUSION JAVASCRIPT  ************///////////////////////////////:******************* -->
            <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
            <script src="<?= $this->assetUrl('owl-carousel/owl.carousel.min.js') ?>"></script>

            <?= $this->section('script') ?>
        <!-- FIN INCLUSION JAVASCRIPT  ************///////////////////////////////:******************* -->
        <script type="text/javascript">
        // menu deco
        $('.decoMenu').click(function(){
            $('.decoSubmenu').toggle();
        });
        </script>
    </body>
</html>
