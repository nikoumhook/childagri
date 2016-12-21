<?php $this->layout('front', ['title' => 'Jeu carte', 'repas' => $repas,
    'aliment1' => $aliment1,'aliment2' => $aliment2,'aliment3' => $aliment3]) ?>

<?php $this->start('head') ?>

    <link rel="stylesheet" href="<?= $this->assetUrl('css/carte.css') ?>">

<?php $this->stop('head') ?>

<?php $this->start('main_content') ?>

    <div id="container_carte" class="pal">

        <div id="zonePedago" class="zonePedago mal">

            <div class="aliment1 pam alim">
                <!-- Div avec img croix en css pour fermer zone -->
                <div class="pedagoFermer cursor"></div>

                <!-- Titre -->
                <div class="grid-3 mbl flex-container-v align">
                    <div class="vignetteAlimentPedago push">
                        <img class="" src="<?= $this->assetUrl($aliment1['urlImg']);?>" alt="">
                    </div>
                    <div>
                        <h1 class="mas txtcenter"><?=ucfirst($aliment1['name'])?></h1>
                    </div>
                    <div class="vignetteAlimentPedago pull">
                        <img class="" src="<?= $this->assetUrl($aliment1['urlImg']);?>" alt="">
                    </div>
                </div> <!-- fermeture titre -->

                <!-- Piste Audio -->
                <div class="pas">
                    <audio controls="controls">
                         <source src="<?= $this->assetUrl($aliment1['urlSound']);?>" type="audio/mp3" >
                    </audio>
                </div> <!-- fermeture piste audio -->

                <!-- Info pédago -->
                <div class="flex-container-v pas">
                    <p><?= htmlspecialchars_decode($aliment1['content'])?></p>
                </div> <!-- fermeture zone3 -->

                <!-- Picto Agri -->
                <div class="flex-container-v pas">
                    <img src="<?= $this->assetUrl($aliment1['illus'])?>" class="vignetteAgri" alt="">
                </div> <!-- fermeture picto agri -->

            </div> <!-- fermeture aliment1 -->

            <div class="aliment2 pam alim">
                <!-- Div avec img croix en css pour fermer zone -->
                <div class="pedagoFermer cursor"></div>

                <!-- Titre -->
                <div class="grid-3 mbl flex-container-v align">
                    <div class="vignetteAlimentPedago push">
                       <img class="" src="<?= $this->assetUrl($aliment2['urlImg']);?>" alt="">
                    </div>
                    <div>
                        <h1 class="txtcenter"> <?= ucfirst($aliment2['name'])?> </h1>
                    </div>
                    <div class="vignetteAlimentPedago pull">
                       <img class="" src="<?= $this->assetUrl($aliment2['urlImg']);?>" alt="">
                    </div>
                </div> <!-- fermeture titre -->

                <!-- Piste audio -->

                <div class="pas">
                    <audio controls="controls">
                         <source src="<?= $this->assetUrl($aliment2['urlSound']);?>" type="audio/mp3" >
                    </audio>
                </div> <!-- fermeture piste audio -->

                <!-- Info pédago -->
                <div class="flex-container-v pas">
                    <p><?= htmlspecialchars_decode($aliment2['content'])?></p>
                </div> <!-- fermeture zone3 -->

                 <!-- Picto Agri -->
                <div class="flex-container-v pas">
                    <img src="<?= $this->assetUrl($aliment2['illus'])?>" class="vignetteAgri" alt="">
                </div> <!-- fermeture picto Agri -->

            </div> <!-- fermeture aliment2 -->

            <div class="aliment3 pam alim">
                <!-- Div avec img croix en css pour fermer zone -->
                <div class="pedagoFermer cursor"></div>

                 <!-- Titre -->
                <div class="grid-3 mbl flex-container-v align">
                    <div class="vignetteAlimentPedago push">
                        <img class="" src="<?= $this->assetUrl($aliment3['urlImg']);?>" alt="">
                    </div>
                    <div>
                        <h1 class="txtcenter"> <?= ucfirst($aliment3['name']) ?> </h1>
                    </div>
                    <div class="vignetteAlimentPedago pull">
                        <img class="" src="<?= $this->assetUrl($aliment3['urlImg']);?>" alt="">
                    </div>
                </div> <!-- fermeture titre -->

                <!-- Piste audio -->
                <div class="pas">
                        <audio controls="controls">
                            <source src="<?= $this->assetUrl($aliment3['urlSound']);?>" type="audio/mp3" >
                        </audio>
                </div><!-- fermeture audio -->

                <!-- Info pédago -->
                <div class="flex-container-v pas">
                    <p><?= htmlspecialchars_decode($aliment3['content'])?></p>
                </div><!-- fermeture info pedago -->

                <!-- Picto Agri -->
                <div class="flex-container-v pas">
                    <img src="<?= $this->assetUrl($aliment3['illus'])?>" class="vignetteAgri" alt="">
                </div> <!-- fermeture picto Agri -->

            </div> <!-- fermeture aliment3 -->

        </div> <!-- fermeture div zonePedago -->


        <?php $this->insert('front/element_carte') ?>

    </div>

<?php $this->stop('main_content') ?>

<?php $this->start('script');?>
<script>
    var xy = [
    ['null','null'],
    //Le premier est défini à null pour pouvoir appeler les autres en fonction de l'id dans la db
    //['x','y'],
    ['340','105'],
    ['110','270'],
    ['210','230'],
    ['90','70'],
    ['240','160'],
    ['30','100'],
    ['160','145'],
    ['250','90'],
    ['400','360'],
    ['300','150'],
    ['136','52'],
    ['185','90'],
    ['200','340'],
    ['160','220'],
    ['290','80'],
    ['160','300'],
    ['190','0'],
    ['85','140'],
    ['195','45'],
    ['110','200'],
    ['300','300'],
    ['280','240']
    ];

    $(document).ready(function(){
        //Etabli la position du marker et son image en svg
        $("#marker1").attr("x",xy[<?= $aliment1['id_land']; ?>][0]);
        $("#marker1").attr("y",xy[<?= $aliment1['id_land']; ?>][1]);
        $("#marker1").attr("xlink:href", '<?= $this->assetUrl($aliment1['urlImg']);?>');
        $("#marker2").attr("x",xy[<?= $aliment2['id_land']; ?>][0]);
        $("#marker2").attr("y",xy[<?= $aliment2['id_land']; ?>][1]);
        $("#marker2").attr("xlink:href", "<?= $this->assetUrl($aliment2['urlImg']);?>");
        $("#marker3").attr("x",xy[<?= $aliment3['id_land']; ?>][0]);
        $("#marker3").attr("y",xy[<?= $aliment3['id_land']; ?>][1]);
        $("#marker3").attr("xlink:href", '<?= $this->assetUrl($aliment3['urlImg']);?>');

        var marker1 = false;
        var marker2 = false;
        var marker3 = false;

        $('#marker1').click(function(){

            marker1 = true;
            $('.alim').hide();
            $('.aliment1').slideToggle();
            controleClickPedago();
        });

        $('#marker2').click(function(){

            marker2 = true;
            $('.alim').hide();
            $('.aliment2').slideToggle();
            controleClickPedago();
        });

        $('#marker3').click(function(){

            marker3 = true;
            $('.alim').hide();
            $('.aliment3').slideToggle();
            controleClickPedago();
        });

        $('.pedagoFermer').click(function(){
            $('.alim').slideUp();
        });


        var controleClickPedago = function(){
            if (marker1 && marker2 && marker3) {

                $.ajax({
                    url: '<?=$this->url('ajax_finCarte');?>',
                    type:'post',
                    cache:false,
                    dataType: 'json',
                    success: function(result){

                    }//fermeture success
                });//fermeture $.ajax


                // activation du bouton retour a la carte de france !
                if (<?= count($_SESSION['save']['repas'])?> < 4) {

                    $('#navReturn').slideDown();

                }

                if (<?= count($_SESSION['save']['repas'])?> == 2) {
                    // script qui fait apparaitre La bulle et qui active le quizz
                    $('#bubulle').addClass('containerBulle');
                    $('#navTrophee').addClass('shake-hard cursor')
                    $('#lienQuizz').attr('href','<?= $this->url('game_quizz');?>');
                }

            };
        };

    });// ready jquery

</script>

<?php $this->stop('script'); ?>
