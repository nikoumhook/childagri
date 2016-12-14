<?php $this->layout('back', ['title' => 'Liste des aliments']) ?>

<?php $this->start('head') ?>

	<!-- Style Knacss -->
	<link rel="stylesheet" href="<?=$this->assetUrl('css/knacss.css');?>">
	<!-- Style -->

	<link rel="stylesheet" href="<?= $this->assetUrl('css/backPedago.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


	<h1 class="txtcenter"> Liste de vos aliments</h1>

	<table>

		<thead>
			<tr>
				<th>Nom</th>
				<th>Image</th>
				<th>Région</th>
				<th>Etat</th>
				<th colspan="3">Actions</th>
				

			</tr>
			
		</thead>

		<tbody>
		<?php foreach ($aliments as $aliments):?>
			
			<tr>
				<td><?=ucfirst($aliments['name']);?></td>

				<td><img class="" src="<?=$this->assetUrl($aliments['urlImg']);?>"></td>

				<td><?=ucfirst($aliments['region']);?></td>

				<td>
					<?php 
					switch ($aliments['publish']) {
					case "oui":
						echo "Publié";
						break;
					case "non":
						echo "Brouillon";
						break;
					}
					?>
				</td>

				<td><input type="radio" name="publish" value="oui"></input> Publier</td>
				<td><input type="radio" name="publish" value="non"></input> En brouillon</td>
				<td><button type="submit" class=""</button>Enregistrer</td>
			</tr>
		<?php endforeach;?>
		</tbody>

	</table>
	<?php $this->stop('main_content') ?>