<?php $this->layout('back', ['title' => 'LIste des quizz']) ?>

<?php $this->start('head') ?>

	<!-- Style Knacss -->
	<link rel="stylesheet" href="<?=$this->assetUrl('css/knacss.css');?>">
	<!-- Style -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/backPedago.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


<h1 class="txtcenter"> Liste de vos quizz</h1>

	<table>
		<thead>
			<tr>
				<th>Aliment:</th>
				<th>Etat:</th>
				<th>Contenu du quizz:</th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($aliments as $aliment):?>
			<tr>
				<td><?=ucfirst($aliment['name']);?></td>
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
				<td><a href="<?= $this->url('back_ficheQuizz', ['id'=>$aliment['id']]);?>">Voir le quizz</a></td>

			</tr>
		<?php endforeach;?>
		</tbody>

	</table>
<?php $this->stop('main_content') ?>