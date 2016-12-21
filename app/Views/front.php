<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">

        <title><?= $this->e($title) ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" href="<?= $this->assetUrl('css/knacss.css') ?>">


        <link rel="stylesheet" href="<?= $this->assetUrl('owl-carousel/owl.theme.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('owl-carousel/owl.transitions.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('owl-carousel/owl.carousel.css') ?>">


        <!-- Typo -->
        <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


        <!-- import des fichiers css meta et script si besoin  -->
        <?= $this->section('head') ?>

        <link rel="stylesheet" href="<?= $this->assetUrl('css/interface.css') ?>">
        <link rel="stylesheet" type="text/css" href="http://csshake.surge.sh/csshake.min.css">
        <link rel="stylesheet" href="<?= $this->assetUrl('css/banniere.css') ?>">
        <link rel="stylesheet" href="<?= $this->assetUrl('css/responsive.css') ?>">

    </head>
    <body>

        <!-- <div class="debug pam">
            <pre>
                <php var_dump($_SESSION);?>
            </pre>

        </div> -->

        <!-- CONTENU  ************///////////////////////////////:******************* -->
        <main>
            <?= $this->section('main_content') ?>
        </main>
        <!-- BOUTON PERMANENTS ************///////////////////////////////:******************* -->
        <div id="navDeco">
            <div class="decoMenu plm prm pts pbs">
                <div class="menu-icon">
                        <span></span>
                </div>
                <span class="displayNoneSmall">MENU</span>
                <ul class="decoSubmenu">
                    <li><a class="mas pas" href="<?= $this->url('game_reset') ?>">
                    <img class="mini mrs" src="<?= $this->assetUrl('img/cycle.svg')?>" alt=""><span class="displayNoneSmall">REJOUER</span></a></li>
                    <li><a class="mas pas" href="<?= $this->url('game_quit') ?>">
                    <img class="mini mrs" src="<?= $this->assetUrl('img/cross.svg')?>"><span class="displayNoneSmall" >SE DECONNECTER</span></a></li>
                    <li id="resultats"><a class="mas pas" href="#">
                    <img class="mini mrs" src="<?= $this->assetUrl('img/trophy.svg')?>"><span class="displayNoneSmall" >VOS RESULTATS</span></a></li>
                </ul>
            </div>
        </div>

        <!-- utiliser par la page resulta pour afficher si la sauvegarde c'est bien deroulé -->
        <div id='popResultat'></div>
        <?php if (!($w_current_route == 'game_quizz' || $w_current_route == 'game_result')): ?>

            <!-- affichage du bonhomme et de sa bulle -->
            <!-- <div id="navTrophee" class="pam mrl shake-hard"> -->
            <a id="lienQuizz" class="noCursor" href="#">
                <div id="navTrophee" class="pam mrl">
                    <div id="bubulle" class=""></div>
                    <?php $this->insert('front/intestin'); ?>
                </div>
            </a>
        <?php endif; ?>
        <!-- BOUTON PERMANENTS ************///////////////////////////////:******************* -->


        <!-- BOUTON POUR ASSIETTE ************///////////////////////////////:******************* -->
        <?php $carte=''; ?>

        <?php if ($w_current_route == 'game_assiette'): ?>

            <?php if (isset($carte)): ?>
                <div id="navTopBar" class="">
                    <div class="pas flex-container-v displayNoneSmall">
                        <div class="center-wrap">
                          <div class="title-container">
                            <div class="ribbon-left"></div>
                            <div class="backflag-left"></div>
                            <div class="title"><?= strtoupper($_SESSION['player']['username']);?> A TOI DE JOUER POUR DECOUVRIR LES ALIMENTS QUE TU MANGES AU QUOTIDIEN.
                             <span class="sous-title">
                                 Cliques sur un repas et des aliments vont apparaitre<br>
                                 Choisis 3 aliments que tu souhaites manger et glisse-les dans ton assiette
                             </span>
                            </div>
                            <div class="backflag-right"></div>
                            <div class="ribbon-right"></div>
                          </div>
                        </div>
                        <!-- le contenu ici est remplacé par jQuery quand un repas est selectionné ! -->
                        <!-- <div class="reglesAssiettes1 pas txtcenter">
                            <= strtoupper($_SESSION['player']['username']);?> A TOI DE JOUER POUR DECOUVRIR LES ALIMENTS QUE TU MANGES AU QUOTIDIEN
                        </div>
                        <div class="reglesAssiettes2 pas txtcenter">
                            Cliques sur un repas et des aliments vont apparaitre <br>
                            Choisis 3 aliments que tu souhaites manger et glisse-les dans ton assiette
                        </div> -->
                    </div>
                </div>
            <?php endif; ?>


            <div id="navLeftBar" class="mll">
                <ul>
                    <li id="repas1" class="circle <?= (empty($repas) || !in_array(1,$repas))? 'obsRepas' : 'repasFait' ?>">PETIT-DEJ
                        <img src="<?= $this->assetUrl('img/fourmis.png');?>" class="fourmis1">
                    </li>
                    <li id="repas2" class="circle <?= (empty($repas) || !in_array(2,$repas))? 'obsRepas' : 'repasFait' ?>">DEJEUNER
                        <img src="<?= $this->assetUrl('img/fourmis.png');?>" class="fourmis2">
                    </li>
                    <li id="repas3" class="circle <?= (empty($repas) || !in_array(3,$repas))? 'obsRepas' : 'repasFait' ?>">GOÛTER
                        <img src="<?= $this->assetUrl('img/fourmis.png');?>" class="fourmis3">
                    </li>
                    <li id="repas4" class="circle <?= (empty($repas) || !in_array(4,$repas))? 'obsRepas' : 'repasFait' ?>">DÎNER
                        <img src="<?= $this->assetUrl('img/fourmis.png');?>" class="fourmis4">
                    </li>
                </ul>
            </div>
        <?php endif; ?>

        <!-- FIN BOUTON POUR ASSIETTE ************///////////////////////////////:******************* -->
        <!-- BOUTON POUR CARTE  ************///////////////////////////////:******************* -->
        <?php if ($w_current_route == 'game_carte'): ?>

        <?php $repasName = array_keys($_SESSION['repasEnCour']) ;?>

        <?php
                switch ($repasName[0]) {
                    case '1':
                        $repasName = 'petit-déjeuner';
                        break;
                     case '2':
                        $repasName = 'déjeuner';
                        break;
                    case '3':
                       $repasName = 'goûter';
                        break;
                    case '4':
                        $repasName = 'dîner';
                        break;
                        };
        ?>

        <div class="reglesCarte1 flex-container-v displayNoneSmall">
                <div class="center-wrap">
                  <div class="title-container">
                    <div class="ribbon-left"></div>
                    <div class="backflag-left"></div>
                    <div class="title">
                        <?= strtoupper($_SESSION['player']['username']);?>
                        VOILA LA CARTE DES REGIONS QUI PRODUISENT LES ALIMENTS
                        DE TON <?=strtoupper($repasName);?>
                        <span class="sous-title">
                        Clique sur chaque aliment pour en savoir plus.<br> Surprises garanties !!
                        </span>
                    </div>
                    <div class="backflag-right"></div>
                    <div class="ribbon-right"></div>
                  </div>
                </div>
        </div>

            <?php if (isset($_SESSION['save']['id_quizz']) && count(explode(',',$_SESSION['save']['id_quizz'])) < 12): ?>
                <div id="navReturn" class="pam">
                    <a href="<?= $this->url('game_assiette') ?>">
                        <img class="btn-back shake-chunk shake-constant shake-constant--hover" src="<?= $this->assetUrl('/img/assiette_petitDej.svg') ?>" alt="retour">
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <!-- INCLUSION JAVASCRIPT  ************///////////////////////////////:******************* -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="<?= $this->assetUrl('owl-carousel/owl.carousel.min.js') ?>"></script>

        <?= $this->section('script') ?>

        <script src="<?= $this->assetUrl('js/fixTouch.js') ?>"></script>

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

    <?php if ($w_current_route == 'game_assiette'): ?>

            <script>

        $(document).ready(function(){

           var fourmis1 = function(){
                var $fourmis = $('.fourmis1');

                $fourmis.fadeIn({queue: false, duration: 1000});
                $fourmis.animate({left: '900%'}, 8000, function(){
                    // Anim complète
                    $fourmis.css('transform', 'rotate(75deg)')
                })
                .animate({top:'90%'}, 6000, function(){
                    // Anim complète
                    $fourmis.css('transform', 'rotate(115deg)')
                })
                .animate({right:'300%'}, 5000, function(){
                    // Anim complète
                    $fourmis.css('transform', 'rotate(110deg)')
                });
           };


           var fourmis2 = function(){
                var $fourmis = $('.fourmis2');
                $fourmis.fadeIn({queue: false, duration: 1000});
                $fourmis.animate({left: '500%'}, 6000, function(){
                    // Anim complète
                    $fourmis.css('transform', 'rotate(-75deg)')
                })
                .animate({bottom:'90%'}, 6000, function(){
                    // Anim complète
                   $fourmis.css('transform', 'rotate(-175deg)')
                })
                .animate({left:'50%'}, 5000, function(){
                    // Anim complète
                    $fourmis.css('transform', 'rotate(45deg)')
                });
           };


           var fourmis3 = function(){
                var $fourmis = $('.fourmis3');
                $fourmis.fadeIn({queue: false, duration: 1000});
                $fourmis.animate({left: '300%'}, 5500, function(){
                    // Anim complète
                    $fourmis.css('transform', 'rotate(75deg)')
                })
                .animate({top:'90%'}, 6000, function(){
                    // Anim complète
                   $fourmis.css('transform', 'rotate(-150deg)')
                })
                .animate({right:'0%'}, 7000, function(){
                    // Anim complète
                    $fourmis.css('transform', 'rotate(150deg)')
                });

           };

           var fourmis4 = function(){
                var $fourmis = $('.fourmis4');
                $fourmis.fadeIn({queue: false, duration: 1000});
                $fourmis.animate({left: '140%'}, 3500, function(){
                    // Anim complète
                    $fourmis.css('transform', 'rotate(-75deg)')
                })
                .animate({bottom:'70%'}, 6000, function(){
                    // Anim complète
                   $fourmis.css('transform', 'rotate(-150deg)')
                })
                .animate({right:'200%'}, 3000, function(){
                    // Anim complète
                    $fourmis.css('transform', 'rotate(-300deg)')
                });


           };

            $('#repas1').click(function(){
                fourmis1();
                fourmis2();
                fourmis3();
                fourmis4();
            });

            $('#repas2').click(function(){
                fourmis1();
                fourmis2();
                fourmis3();
                fourmis4();
            });


            $('#repas3').click(function(){
                fourmis1();
                fourmis2();
                fourmis3();
                fourmis4();
            });

            $('#repas4').click(function(){
                fourmis1();
                fourmis2();
                fourmis3();
                fourmis4();
            });


            // requete de récuperation des resultat :


            // requete de récuperation des resultat deja enregistré via le menu deco:
            $('#resultats').click(function(e){
                    e.preventDefault();
                    $.ajax({
                        url: '<?=$this->url('ajax_recupresultat');?>',
                        type: 'post',
                        cache:false,
                        dataType: 'json',
                        success: function(result){
                            if (result.success) {
                                $('#popResultat').html(result.resultats);
                            }else {
                                $('#popResultat').html('<div><ul><li>Tu n\'as pas de résultat</li></ul></div>');
                            }
                            $('#popResultat').click(function(){
                                $(this).children().remove();
                            });

                        }//fermeture success
                    });//fermeture $.ajax
            });// fermeture buttton clic

            //}); // pb avec git il reste sa


        });

        </script>
    <?php endif;?>

    <script>
    $(function(){

        $('.decoMenu').click(function(e){
            e.preventDefault();
            thiz = $(this).children('.menu-icon');
            if(thiz.hasClass('is-opened')){
                thiz.addClass('is-closed').removeClass('is-opened');
            }
            else{
                thiz.removeClass('is-closed').addClass('is-opened');
            }
        });

    });
    </script>
        <!-- FIN INCLUSION JAVASCRIPT  ************///////////////////////////////:******************* -->

    </body>
</html>
