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

        <div class="debug pam">
            <pre>
                <?php var_dump(); ?>
            </pre>
        </div>


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
            image Intestinc
        </div>
        <!-- BOUTON PERMANENTS ************///////////////////////////////:******************* -->


        <!-- BOUTON POUR ASSIETTE ************///////////////////////////////:******************* -->
        <?php
        $carte=''; ?>

        <?php if ($w_current_route == 'game_assiette'): ?>

            <?php if (isset($carte)): ?>
                <div id="navTopBar">
                    <a class="customNavigation btn prev"><</a>
                    <ul id="owl-demo">
                        <li class="item" id="from1" name="Babybel"><img src="<?= $this->assetUrl('img/aliment_babybel.svg') ?>" alt=""></li>
                        <li class="item" id="from2" name="Beurre"><img src="<?= $this->assetUrl('img/aliment_beurre.svg') ?>" alt=""></li>
                        <li class="item" id="from3" name="Cornflakes"><img src="<?= $this->assetUrl('img/aliment_cornflakes.svg') ?>" alt=""></li>
                        <li class="item" id="from4" name="Kiwi"><img src="<?= $this->assetUrl('img/aliment_kiwi.svg') ?>" alt=""></li>
                        <li class="item" id="from5" name="Knacki"><img src="<?= $this->assetUrl('img/aliment_knacki.svg') ?>" alt=""></li>
                        <li class="item" id="from6" name="Miel"><img src="<?= $this->assetUrl('img/aliment_miel.svg') ?>" alt=""></li>
                        <li class="item" id="from7" name="Mousseline"><img src="<?= $this->assetUrl('img/aliment_mousseline.svg') ?>" alt=""></li>
                        <li class="item" id="from8" name="Pomme"><img src="<?= $this->assetUrl('img/aliment_pomme.svg') ?>" alt=""></li>
                        <li class="item" id="from9" name="Roquefort"><img src="<?= $this->assetUrl('img/aliment_roquefort.svg') ?>" alt=""></li>
                        <li class="item" id="from10" name="Surimi"><img src="<?= $this->assetUrl('img/aliment_surimi.svg') ?>" alt=""></li>
                    </ul>
                    <a class="customNavigation btn next">></a>
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
                fleche de retour
            </div>
        <?php endif; ?>
        <!-- FIN BOUTON POUR CARTE  ************///////////////////////////////:******************* -->

        <main>
            <?= $this->section('main_content') ?>
        </main>

        <!-- INCLUSION JAVASCRIPT  ************///////////////////////////////:******************* -->
            <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

            <?= $this->section('script') ?>
        <!-- FIN INCLUSION JAVASCRIPT  ************///////////////////////////////:******************* -->

        <script src="<?= $this->assetUrl('js/interface.js') ?>"></script>
        <script src="<?= $this->assetUrl('owl-carousel/owl.carousel.min.js') ?>"></script>
    </body>
</html>
