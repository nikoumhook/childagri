<?php $this->layout('front', ['title' => 'Jeu carte', 'repas' => $repas]) ?>

<?php $this->start('head') ?>

    <!-- Typo -->
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


    <link rel="stylesheet" href="<?= $this->assetUrl('css/carte.css') ?>">

<?php $this->stop('head') ?>


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
    $("#marker1").attr("x",xy[<?php echo $aliment1['id_land'] ?>][0]);
    $("#marker1").attr("y",xy[<?php echo $aliment1['id_land'] ?>][1]);
    $("#marker1").attr("xlink:href", '<?= $this->assetUrl($aliment1['urlImg']);?>');
    $("#marker2").attr("x",xy[<?php echo $aliment2['id_land'] ?>][0]);
    $("#marker2").attr("y",xy[<?php echo $aliment2['id_land'] ?>][1]);
    $("#marker2").attr("xlink:href", "<?= $this->assetUrl($aliment2['urlImg']);?>");
    $("#marker3").attr("x",xy[<?php echo $aliment3['id_land'] ?>][0]);
    $("#marker3").attr("y",xy[<?php echo $aliment3['id_land'] ?>][1]);
    $("#marker3").attr("xlink:href", '<?= $this->assetUrl($aliment3['urlImg']);?>');

    var marker1 = false;
    var marker2 = false;
    var marker3 = false;

    $('#marker1').click(function(){

        marker1 = true;
        $('.alim').hide();
        $('.aliment1').slideToggle( "slow", function() {

        });
        controleClickPedago();
    });

    $('#marker2').click(function(){

        marker2 = true;
        $('.alim').hide();
        $('.aliment2').slideToggle( "slow", function() {

        });
        controleClickPedago();
    });

    $('#marker3').click(function(){

        marker3 = true;
        $('.alim').hide();
        $('.aliment3').slideToggle( "slow", function() {

        });
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
                data: {

                },
                dataType: 'json',
                success: function(result){
                    if (result.success == 'ok') {

                        $('#navTopBar').html(result.ingredients);
                        dragFn();
                        dropFn();
                        owl();

                    }

                }//fermeture success
            });//fermeture $.ajax
            // activation du bouton retour a la carte de france !
            if (<?= count($_SESSION['save']['repas'])?> < 12) {

                $('#navReturn').slideDown();
            }else {
                $('#navReturn').html('tu as fait tous les repas de la journée');
                $('#navReturn').slideDown();
            }
            // a cette endroit faire le script qui fait apparaitre Le logo du quizz
        };
    };

});// ready jaquery


</script>
<?php $this->stop('script') ?>

<?php $this->start('main_content') ?>
    <div id="container_carte" class="pal">

        <div id="zonePedago" class="zonePedago mal">

            <div class="aliment1 pal alim">
                <!-- Div avec img croix en css pour fermer zone -->
                <div class="pedagoFermer"></div>

                <!-- Titre -->
                <h1 class="txtcenter"><?= ucfirst($aliment1['name']) ?></h1>

                <!-- Zone 1 Info pédago -->
                <div class="grid-2 flex-container-v pas">
                    <!-- Picto audio -->
                    <div class="pictoSound pas">
                        <img src="<?= $this->assetUrl('img/sound.svg') ?>" class="vignetteSound" alt="">
                    </div>
                    <!-- Piste audio -->
                    <div class="pam">
                        <audio controls="controls">
                            <source src="<?= $this->assetUrl($aliment1['urlSound']);?>" type="audio/mp3" >
                        </audio>
                    </div>
                </div> <!-- fermeture zone1 -->

                <!-- Zone 2 Info pédago -->
                <div class="flex-container-v pam">
                    <p><?= $aliment1['content'] ?></p>
                    <img class="left vignetteAlimentPedago" src="<?= $this->assetUrl($aliment1['urlImg']);?>" alt="">
                </div> <!-- fermeture zone2 -->
            </div> <!-- fermeture aliment1 -->

            <div class="aliment2 pal alim">
                <!-- Div avec img croix en css pour fermer zone -->
                <div class="pedagoFermer"></div>

                <!-- Titre -->
                <h1 class="txtcenter"> <?= ucfirst($aliment2['name']) ?> </h1>

                <!-- Zone 1 Info pédago -->
                <div class="grid-2 flex-container-v pas">
                    <!-- Picto audio -->
                    <div class="pictoSound pas">
                        <img src="<?= $this->assetUrl('img/sound.svg') ?>" class="vignetteSound" alt="">
                    </div>
                    <!-- Piste audio -->
                    <div class="pam">
                        <audio controls="controls">
                            <source src="<?= $this->assetUrl($aliment2['urlSound']);?>" type="audio/mp3" >
                        </audio>
                    </div>
                </div> <!-- fermeture zone1 -->

                <!-- Zone 2 Info pédago -->
                <div class="flex-container-v pam">
                    <p><?= $aliment2['content'] ?></p>
                    <img class="left vignetteAlimentPedago" src="<?= $this->assetUrl($aliment2['urlImg']);?>" alt="">
                </div> <!-- fermeture zone2 -->
            </div> <!-- fermeture aliment2 -->


            <div class="aliment3 pal alim">
                <!-- Div avec img croix en css pour fermer zone -->
                <div class="pedagoFermer"></div>

                 <!-- Titre -->
                <h1 class="txtcenter"> <?= ucfirst($aliment3['name']) ?> </h1>


                <!-- Zone 1 Info pédago -->
                <div class="grid-2 flex-container-v pas">
                    <!-- Picto audio -->
                    <div class="pictoSound pas">
                        <img src="<?= $this->assetUrl('img/sound.svg') ?>" class="vignetteSound" alt="">
                    </div>
                    <!-- Piste audio -->
                    <div class="pam">
                        <audio controls="controls">
                            <source src="<?= $this->assetUrl($aliment3['urlSound']);?>" type="audio/mp3" >
                        </audio>
                    </div>
                </div><!-- fermeture zone1 -->

                <!-- Zone 2 Info pédago -->
                <div class="flex-container-v pam">
                    <p><?= $aliment3['content'] ?></p>
                    <img class="left vignetteAlimentPedago" src="<?= $this->assetUrl($aliment3['urlImg']);?>" alt="">
                </div>
            </div> <!-- fermeture aliment1 -->

        </div> <!-- fermeture div zonePedago -->


        <?php $this->insert('front/element_carte') ?>

    </div>

<?php $this->stop('main_content') ?>
