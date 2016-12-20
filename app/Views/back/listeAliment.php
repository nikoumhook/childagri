<?php $this->layout('back', ['title' => 'Liste des aliments']) ?>

<?php $this->start('head') ?>

    <!-- Feuille de style LISTE BACK -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/liste.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


	<h1 class="txtcenter pam"> Liste des aliments</h1>

	<table>

		<thead>
			<tr>
				<th class="txtcenter">NOM</th>
				<th class="txtcenter">IMAGE</th>
				<th class="txtcenter">REGION</th>
				<th class="txtcenter">ETAT</th>
				<th class="txtcenter">MODIFIER</th>
				<th class="txtcenter">SUPPRIMER</th>


			</tr>

		</thead>

		<tbody>
		<?php foreach ($aliments as $aliment):?>

			<tr>
				<td class="txtcenter"><?=ucfirst($aliment['name']);?></td>

				<td class="txtcenter"><img class="" src="<?=$this->assetUrl($aliment['urlImg']);?>"></td>

				<td class="txtcenter"><?=ucwords(str_replace('-', ' ', ($aliment['region'])));?></td>

				<td class="txtcenter">
					<?php
					switch ($aliment['publish']) {
					case "oui":
						echo "Publié";
						break;
					case "non":
						echo "Brouillon";
						break;
					}
					?>
				</td>

				<td class="txtcenter">
                    <a href="<?= $this->url('back_ficheAliment', ['id'=>$aliment['id']]);?>">
    				<i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
				</td>
				<td class="txtcenter">
                    <div class="deleteBtn cursor" type="button" name="delete" data-id="<?= $aliment['id'];?>">
                        <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                    </div>
    				</a>
				</td>
			</tr>

		<?php endforeach;?>
		</tbody>
	</table>
	<?php $this->stop('main_content') ?>



	<?php $this->start('js') ?>
        <script>
            $(function(){
                var id;
                var thiz;

                $('.deleteBtn').click(function(e){
                    e.preventDefault();
                    $('.verif').remove();
                    thiz = $(this).parent().parent();
                    id = $(this).attr('data-id');
                    $(this).parent().append('<div class="verif"><button class="green cursor" id="oui" type="button">OUI</button><button class="red cursor" id="non" type="button">NON</button></div>');

                    $('#oui').click(function(){
                        reqAjax(id,thiz);

                    });

                    $('#non').click(function(){
                        $('.verif').remove();
                    });

                });


                var reqAjax = function(idAliment,actionSurQui){
                    $.ajax({
        				url: '<?=$this->url('ajax_deleteAliment');?>',
        				type: 'post',
        				cache:false,
        				data: {id:idAliment},
        				dataType: 'json',
        				success: function(result){
                            if (result.success) {
                                actionSurQui.remove();
                            }
        				}//fermeture success
        			});//fermeture $.ajax
                }
            });
        </script>
	<?php $this->stop('js') ?>
