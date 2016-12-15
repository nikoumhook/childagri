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
				<th>Voir la fiche</th>
				

			</tr>
			
		</thead>

		<tbody>
		<?php foreach ($aliments as $aliment):?>
			
			<tr>
				<td><?=ucfirst($aliment['name']);?></td>

				<td><img class="" src="<?=$this->assetUrl($aliment['urlImg']);?>"></td>

				<td><?=ucfirst($aliment['region']);?></td>

				<td>
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

				<td><a href="<?= $this->url('back_ficheAliment', ['id'=>$aliment['id']]);?>">Voir la fiche</a></td>
			</tr>

		<?php endforeach;?>
		</tbody>

	</table>
	<?php $this->stop('main_content') ?>