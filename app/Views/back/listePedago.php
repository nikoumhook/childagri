<?php $this->layout('back', ['title' => 'Liste des contenus pedagogiques']) ?>

<?php $this->start('head') ?>

	<!-- Style Knacss -->
	<link rel="stylesheet" href="<?=$this->assetUrl('css/knacss.css');?>">
	<!-- Style -->

	<link rel="stylesheet" href="<?= $this->assetUrl('css/backPedago.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


	<h1 class="txtcenter"> Liste de vos contenus pédagogiques</h1>

	<table>
		<thead>
			<tr>
				<th>Aliment</th>
				<th>Région</th>
				<th>Etat</th>
				<th>Voir la fiche</th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($pedagos as $pedago):?>
				<tr>
				<td><?=ucfirst($pedago['ingredient']);?></td>
				<td><?=ucfirst($pedago['region']);?></td>
				<td>
					<?php 
					switch ($pedago['publish']) {
					case "oui":
						echo "Publié";
						break;
					case "non":
						echo "Brouillon";
						break;
					}
					?>
				</td>
				<td><a href="<?= $this->url('back_fichePedago', ['id'=>$pedago['id']]);?>">Voir la fiche</a></td>

			</tr>
		<?php endforeach;?>
		</tbody>

	</table>
<?php $this->stop('main_content') ?>