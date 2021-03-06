<?php $this->layout('back', ['title' => 'Liste des contenus pedagogiques']) ?>

<?php $this->start('head') ?>

    <!-- Feuille de style LISTE BACK -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/liste.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


	<h1 class="txtcenter pam"> Liste des contenus pédagogiques</h1>

	<table>
		<thead>
			<tr>
				<th class="txtcenter">ALIMENT</th>
				<th class="txtcenter">REGION</th>
				<th class="txtcenter">ETAT</th>
				<th class="txtcenter">VOIR</th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($pedagos as $pedago):?>
				<tr>
				<td class="txtcenter"><?=ucwords(str_replace('-', ' ', $pedago['ingredient']));?></td>
				<td class="txtcenter"><?=ucwords(str_replace('-', ' ', $pedago['region']));?></td>
				<td class="txtcenter">
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
				<td class="txtcenter"><a href="<?= $this->url('back_fichePedago', ['id'=>$pedago['id']]);?>"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>

			</tr>
		<?php endforeach;?>
		</tbody>

	</table>
<?php $this->stop('main_content') ?>
