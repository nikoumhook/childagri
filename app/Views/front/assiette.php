<?php $this->layout('front', ['title' => 'Jeu assiette']) ?>

<?php $this->start('script') ?>
<script>
var nbre = 0 ;
$(function () {
    var aliment;
    $('.item').draggable({
        drag : function(event, ui ){
            aliment = $(this).attr('name');
        },
        containment: "html",
        cursor: "move",
        cursorAt: {
            top: 30,
            left: 30
        },
        revert: //true

        // Ancien code renaud test Anthony ci dessus
        function (event, ui) {
            $(this).data("uiDraggable").originalPosition = {
                top: 0,
                left: 0
            };
            return !event;
        }
    });
    var cible = $('#container_assiette').find('#test455');
    var ingr1 ;
    var ingr2 ;
    var ingr3 ;
    $('#container_assiette').droppable({
        accept: aliment,
        drop: function () {
            // nbre sert a compter le nombre d'ingrediant avant de changer de page
            nbre = ++nbre;
            if (nbre == 1) {
                ingr1 = aliment ;
            }else if (nbre == 2) {
                if(aliment == ingr1){
                    nbre = --nbre;
                }
                else{
                    ingr2 = aliment ;
                }
            }else if (nbre == 3) {
                if(aliment == ingr2 || aliment == ingr1){
                    nbre = --nbre;
                }
                else{
                    ingr3 = aliment ;
                    // redirection vers un page en faisant passer les id des elements
                    $.ajax({
                        url: '<?= $this->url('game_carte') ?>',
                        type: 'post',
                        cache: false,
                        data: {"aliment1":ingr1, "day_parts": [1,0,0,0]},
                        dataType: 'json', // Type de données que l'on va recevoir
                    });
                    <?= $this->show('game_carte') ?>
                }
            }
            alert('Vous avez sélectionné ' + aliment + nbre);

            $('#container_assiette').find('#test455').addClass('yellow');
        }

    });
});
</script>
<?php $this->stop('script') ?>

<?php $this->start('main_content') ?>

<div width="100vw" height="100vh" id="container_assiette">
    <img width="70%" src="<?= $this->assetUrl('img/element_assiette.svg') ?>" alt="">
</div>

<?php $this->stop('main_content') ?>
