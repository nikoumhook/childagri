<?php $this->layout('back', ['title' => 'Liste des joueurs']) ?>


<?php $this->start('head') ?>

    <!-- Feuille de style LISTE BACK -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/liste.css') ?>">


<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>

<h1 class="txtcenter pam"> Liste des joueurs</h1>

<table>

	<tr>
		<th>Pseudo</th>
		<th>Date d'anniversaire</th>
		<th>Mail</th>
	</tr>
	<?php foreach($players as $player): ?>
		<tr>
			<td><?= ucfirst($player['username']);?></td>
			<td><?= $player['birthDate'];?></td>
			<td><?= $player['email'];?></td>
		</tr>
	<?php endforeach; ?>

</table>


<?php $this->stop('main_content') ?>
