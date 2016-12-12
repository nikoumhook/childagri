<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= $this->e($title) ?></title>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/knacss.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('owl-carousel/owl.theme.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('owl-carousel/owl.transition.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('owl-carousel/owl.carousel.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('css/interface.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
    </head>
    <body>
        <div id="navTopBar">
            <a class="customNavigation btn prev"><</a>
            <ul id="owl-demo">
                <li class="item" ><img src="<?= $this->assetUrl('img/aliment_babybel.svg') ?>" alt=""></li>
                <li class="item" ><img src="<?= $this->assetUrl('img/aliment_beurre.svg') ?>" alt=""></li>
                <li class="item" ><img src="<?= $this->assetUrl('img/aliment_cornflakes.svg') ?>" alt=""></li>
                <li class="item" ><img src="<?= $this->assetUrl('img/aliment_kiwi.svg') ?>" alt=""></li>
                <li class="item" ><img src="<?= $this->assetUrl('img/aliment_knacki.svg') ?>" alt=""></li>
                <li class="item" ><img src="<?= $this->assetUrl('img/aliment_miel.svg') ?>" alt=""></li>
                <li class="item" ><img src="<?= $this->assetUrl('img/aliment_mousseline.svg') ?>" alt=""></li>
                <li class="item" ><img src="<?= $this->assetUrl('img/aliment_pomme.svg') ?>" alt=""></li>
                <li class="item" ><img src="<?= $this->assetUrl('img/aliment_roquefort.svg') ?>" alt=""></li>
                <li class="item" ><img src="<?= $this->assetUrl('img/aliment_surimi.svg') ?>" alt=""></li>
            </ul>
            <a class="customNavigation btn next">></a>
        </div>
        <div id="navLeftBar">
            <ul>
                <li class="circle">P'tit Dej</li>
                <li class="circle">Repas Midi</li>
                <li class="circle">Goutter</li>
                <li class="circle">Le Soir</li>
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


        <script
    			  src="https://code.jquery.com/jquery-3.1.1.min.js"
    			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    			  crossorigin="anonymous">
        </script>
        <script src="<?= $this->assetUrl('owl-carousel/owl.carousel.min.js') ?>"></script>
        <script src="<?= $this->assetUrl('owl-carousel/owl.carousel.min.js') ?>"></script>
    </body>
</html>
