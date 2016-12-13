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
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <div class="">
            <?= $this->section('script') ?>
        </div>
        <?php
        $carte=''; ?>
        <?php if (isset($carte)): ?>
        <div id="navTopBar">
            <a class="customNavigation btn prev"><</a>
            <ul id="owl-demo">
                <li class="item" id="1" name="Babybel"><img src="<?= $this->assetUrl('img/aliment_babybel.svg') ?>" alt=""></li>
                <li class="item" id="2" name="Beurre"><img src="<?= $this->assetUrl('img/aliment_beurre.svg') ?>" alt=""></li>
                <li class="item" id="3" name="Cornflakes"><img src="<?= $this->assetUrl('img/aliment_cornflakes.svg') ?>" alt=""></li>
                <li class="item" id="4" name="Kiwi"><img src="<?= $this->assetUrl('img/aliment_kiwi.svg') ?>" alt=""></li>
                <li class="item" id="5" name="Knacki"><img src="<?= $this->assetUrl('img/aliment_knacki.svg') ?>" alt=""></li>
                <li class="item" id="6" name="Miel"><img src="<?= $this->assetUrl('img/aliment_miel.svg') ?>" alt=""></li>
                <li class="item" id="7" name="Mousseline"><img src="<?= $this->assetUrl('img/aliment_mousseline.svg') ?>" alt=""></li>
                <li class="item" id="8" name="Pomme"><img src="<?= $this->assetUrl('img/aliment_pomme.svg') ?>" alt=""></li>
                <li class="item" id="9" name="Roquefort"><img src="<?= $this->assetUrl('img/aliment_roquefort.svg') ?>" alt=""></li>
                <li class="item" id="10" name="Surimi"><img src="<?= $this->assetUrl('img/aliment_surimi.svg') ?>" alt=""></li>
            </ul>
            <a class="customNavigation btn next">></a>
        </div>
        <?php endif; ?>

        <div id="navLeftBar">
            <ul>
                <li id="repas1" class="circle">P'tit Dej</li>
                <li id="repas2" class="circle">Repas Midi</li>
                <li id="repas3" class="circle">Goutter</li>
                <li id="repas4" class="circle">Le Soir</li>
            </ul>
        </div>
        <div id="navDeco">
            <div class="decoMenu pam">
                MENU
                <ul class="decoSubmenu">
                    <li><a class="pas" href="#">Reset</a></li>
                    <li><a class="pas" href="#">Deco</a></li>
                </ul>
            </div>
        </div>
        <div id="navTrophee" class="pam">
            image Intestinc
        </div>
        <div id="navReturn" class="pam">
            fleche de retour
        </div>

        <main>
            <?= $this->section('main_content') ?>
        </main>


        <script src="<?= $this->assetUrl('js/interface.js') ?>"></script>
        <script src="<?= $this->assetUrl('owl-carousel/owl.carousel.min.js') ?>"></script>
    </body>
</html>
