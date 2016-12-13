var nbre = 0 ;
var already = [0,0,0,0];
$(document).ready(function(){
    $(".circle").click(function(){
        actualRepas = ($(this).attr('id'));
        $(".circle").removeClass("already");
        $("#" + actualRepas).addClass("already");
    });
});
$(function () {
    var aliment;
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

        // Ancien code renaud test Anthony ci dessus
        function (event, ui) {
            $(this).data("uiDraggable").originalPosition = {
                top: 0,
                left: 0
            };
            return !event;
        }
    });
    var ingr1 ;
    var ingr2 ;
    var ingr3 ;
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
                $("#aliment1").append('<img src="http://localhost' + pic_aliment + '">');
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
            alert(total);
        },

    });
});
