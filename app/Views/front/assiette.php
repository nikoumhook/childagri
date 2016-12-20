<?php $this->layout('front', ['title' => 'Jeu assiette', 'repas' => $repas,'aliments' =>$aliments]) ?>

<?php $this->start('head') ?>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/assiette.css') ?>">
<?php $this->stop('head') ?>



<?php $this->start('main_content') ?>
    <div id="container_assiette" class="pal">
        <div class="containerZoneDrag">
            <div id="dragZone">
                <div class="aliments" id="aliment1"></div>
                <div class="aliments" id="aliment2"></div>
                <div class="aliments" id="aliment3"></div>
            </div>
        </div>

        <img id="assiette" src="<?= $this->assetUrl('img/assiette_petitDej.svg') ?>" alt="assiette de drag">
    </div>
<?php $this->stop('main_content') ?>
<?php $this->start('script') ?>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- J'ai du supprimer la fichier js car j'avais besoin de php dedans du coup il est dessous entierement -->
    <script>

    // config :
    // nom des repas:
    var repas1 = 'petit dejeuné';
    var repas2 = '2nd repas';
    var repas3 = '3eme repas';
    var repas4 = '4eme repas';


    var nbre = 0 ;
    var already = [0,0,0,0];

    // variable qui va permettre d'identifier les aliments selectionnés
    var ingr1 ;
    var ingr2 ;
    var ingr3 ;
    var aliment;
    var total = [];

    var repas = '';// variable qui permettra de stocker l'identité du repas.

    $(document).ready(function(){

        // Permet de mettre la class qui affiche sur quel repas ont est present :
        $(".obsRepas").click(function(){
            actualRepas = ($(this).attr('id'));
            $(".obsRepas").removeClass("already");
            $("#" + actualRepas).addClass("already");
        }); // fin fonction .obsRepas


        // listener qui permet d'ecouter sur quel bouton on click pour le repas choisi
        $('.obsRepas').on('click',function(){
            // ont viens attribuer la valeur de l'id du bouton a la variable
            repas = $(this).attr('id');

            $.ajax({
                url: '<?=$this->url('ajax_getAliments');?>',
                type:'post',
                cache:false,
                data: {
                    repas : repas
                },
                dataType: 'json',
                success: function(result){
                    if (result.success == 'ok') {
                        if (repas == 'repas1') {

                            $('#assiette').attr('src',"<?= $this->assetUrl('img/assiette_petitDej.svg') ?>")

                        }else if (repas == 'repas2') {

                            $('#assiette').attr('src',"<?= $this->assetUrl('img/assiette_dejeuner.svg') ?>")

                        }else if (repas == 'repas3') {

                            $('#assiette').attr('src',"<?= $this->assetUrl('img/assiette_gouter.svg') ?>")

                        }else if (repas == 'repas4') {

                            $('#assiette').attr('src',"<?= $this->assetUrl('img/assiette_dejeuner.svg') ?>")

                        }
                        $('#navTopBar').html(result.ingredients);
                        dragFn();
                        dropFn();
                        owl();

                    }

                }//fermeture success
            });//fermeture $.ajax

            // ont stop le listener pour pas qu'ils n'ecoute plus si ont click sur les autres repas
            $('.obsRepas').off('click');


        });// fin listener obsRepas

        var dragFn = function(){
            // INDIQUE A QUOI SERT CETTE FONCTION :
            $('.item').draggable({
                drag : function(event, ui ){
                    aliment = $(this).attr('id');
                    alimentname= $(this).attr('name');
                },
                containment: "html",
                cursor: "move",
                cursorAt: {
                    top: 50,
                    left: 50
                },
                helper:"clone",
                appendTo: 'body',

                function (event, ui) {
                    $(this).data("uiDraggable").originalPosition = {
                        top: 0,
                        left: 0
                    };
                    return !event;
                }

            }); // fin fonction sur item
        }

        var dropFn = function(){

            // Activation du drop :
            $('#dragZone').droppable({
                accept: aliment,
                drop: function () {
                    // nbre sert a compter le nombre d'ingrediant avant de changer de page
                    if(nbre != 3){
                        nbre = ++nbre
                        if (nbre == 1) {
                            ingr1 = aliment ;
                            total[0] = aliment.replace('from','') ;

                            pic_aliment = $('#'+ ingr1).children('img').attr('src');
                            // alert(pic_aliment);
                            $("#aliment1").append('<img class="alimentssvg" src="'+ pic_aliment + '">');
                            $('#'+aliment).remove();
                        }else if (nbre == 2) {
                            if(aliment == ingr1){
                                nbre = --nbre;
                            }
                            else{
                                ingr2 = aliment ;
                                total[1] = aliment.replace('from','') ;

                                pic_aliment2 = $('#'+ ingr2).children('img').attr('src');
                                // alert(pic_aliment2);
                                $("#aliment2").append('<img src="'+pic_aliment2 + '">');
                                $('#'+ aliment).remove();
                            }
                        }else if (nbre == 3) {
                            if(aliment == ingr2 || aliment == ingr1){
                                nbre = --nbre;
                            }
                            else{
                                ingr3 = aliment ;
                                total[2] = aliment.replace('from','') ;

                                pic_aliment3 = $('#'+ ingr3).children('img').attr('src');
                                // alert(pic_aliment3);
                                $("#aliment3").append('<img src="' + pic_aliment3 + '">');
                                $('#'+aliment).remove();

                                totalJoin = total[1]+','+total[2]+','+total[3];

                                finRepas(total,repas);

                            }
                        }
                    }


                },
            });

        }

        var finRepas = function(total,repas){

            $.ajax({
                url: '<?=$this->url('ajax_finAssiette');?>',
                type:'post',
                cache:false,
                data: {
                    repas : repas[5] ,
                    aliments : total
                },
                dataType: 'json',
                success: function(result){
                    if (result.control == 'ok') {
                        setInterval(function(){
                            $(location).attr('href','<?= $this->url('game_carte'); ?>');
                        },1000);

                        // if (repas == 'repas1') {
                        // }else if (repas == 'repas2') {
                        //
                        // }else if (repas == 'repas3') {
                        //
                        // }else if (repas == 'repas4') {
                        //
                        // }


                    }else {
                        alert('il y a un probleme technique merci de le signaler à rang5@prod.fr');
                    };

                }//fermeture success
            });//fermeture $.ajax

        }// fin fonction finrepas

        var owl = function(){

            // navTopBar
            var owl = $("#owl-demo");

            owl.owlCarousel({
                items : 4, //10 items above 1000px browser width
                itemsDesktop : [1000,5], //5 items between 1000px and 901px
                itemsDesktopSmall : [900,5], // betweem 900px and 601px
                itemsTablet: [600,2], //2 items between 600 and 0
                itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
                pagination:false,
                mouseDrag :false,
                touchDrag :false,
            });

            // Custom Navigation Events
            $(".next").click(function(){
              owl.trigger('owl.next');
            })
            $(".prev").click(function(){
              owl.trigger('owl.prev');
            })
        };

    }); // fin appel Jquery ready

    </script>
<?php $this->stop('script') ?>
