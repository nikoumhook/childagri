<?php $this->layout('front', ['title' => 'Jeu assiette', 'repas' => $repas]) ?>

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
        <img id="assiette" src="<?= $this->assetUrl('img/element_assiette.jpg') ?>" alt="">
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
    var total;

    var repas = '';// variable qui permettra de stocker l'identité du repas.

    $(document).ready(function(){

        // listener qui permet d'ecouter sur quel bouton on click
        $('.obsRepas').on('click',function(){
            // ont viens attribuer la valeur de l'id du bouton a la variable
            repas = $(this).attr('id');


            // PAR DEFAUT LE TEXTE DOIT ETRE PRESENT EN HAUT SUR LA PAGE EN DUR IL SERA CHANGé APRéS
            //a ce moment il faut faire un requete ajax qui correspond au repas choisi et qui viens remplir
            // ---->>>  sa >>>>    $('#owl-demo').html()


            // ont stop le listener pour pas qu'ils n'ecoute plus si ont click sur les autres repas
            $('.obsRepas').off('click');

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

        });// fin listener obsRepas

        // INDIQUE A QUOI SERT CETTE FIONCTION :
        $(".obsRepas").click(function(){
            actualRepas = ($(this).attr('id'));
            $(".obsRepas").removeClass("already");
            $("#" + actualRepas).addClass("already");
        }); // fin fonction .circle



        // INDIQUE A QUOI SERT CETTE FIONCTION :
        $('#dragZone').droppable({
            accept: aliment,
            drop: function () {
                // nbre sert a compter le nombre d'ingrediant avant de changer de page
                if(nbre != 3){
                    nbre = ++nbre
                if (nbre == 1) {
                    ingr1 = aliment ;
                    pic_aliment = $('#'+ ingr1).children('img').attr('src');
                    // alert(pic_aliment);
                    $("#aliment1").append('<img class="alimentssvg" src="http://localhost' + pic_aliment + '">');
                    $('#'+aliment).parent().remove();
                }else if (nbre == 2) {
                    if(aliment == ingr1){
                        nbre = --nbre;
                    }
                    else{
                        ingr2 = aliment ;
                        pic_aliment2 = $('#'+ ingr2).children('img').attr('src');
                        // alert(pic_aliment2);
                        $("#aliment2").append('<img src="http://localhost' + pic_aliment2 + '">');
                        $('#'+ aliment).parent().remove();
                    }
                }else if (nbre == 3) {
                    if(aliment == ingr2 || aliment == ingr1){
                        nbre = --nbre;
                    }
                    else{
                        ingr3 = aliment ;
                        pic_aliment3 = $('#'+ ingr3).children('img').attr('src');
                        // alert(pic_aliment3);
                        $("#aliment3").append('<img src="http://localhost' + pic_aliment3 + '">');
                        $('#'+aliment).parent().remove();

                    }
                }
            }
                total = (ingr1 + ingr2 + ingr3).replace( /[^\d.]/g, '' ).split("");

                if (total.length == 3) {

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

                                if (repas == 'repas1') {
                                    alert('Felicitation, tu as choisi ton '+repas1+', tu peut maintenant en savoir plus sur sur tes choix');
                                }else if (repas == 'repas2') {
                                    alert('Felicitation, tu as choisi ton '+repas2+', tu peut maintenant en savoir plus sur sur tes choix');

                                }else if (repas == 'repas3') {
                                    alert('Felicitation, tu as choisi ton '+repas3+', tu peut maintenant en savoir plus sur sur tes choix');

                                }else if (repas == 'repas4') {
                                    alert('Felicitation, tu as choisi ton '+repas4+', tu peut maintenant en savoir plus sur sur tes choix');

                                }


                            }else {
                                alert('il y a un probleme technique merci de le signaler à rang5@prod.fr');
                            };

                        }//fermeture success
                    });//fermeture $.ajax

                }// fin if totallength = 3
            },
        });
    }); // fin appel Jquery ready

    </script>
<?php $this->stop('script') ?>
