<?php $this->layout('back', ['title' => 'LIste des quizz']) ?>

<?php $this->start('head') ?>

    <!-- Feuille de style LISTE BACK -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/liste.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


<h1 class="txtcenter pam"> Liste des quizz</h1>

	<table>
		<thead>
			<tr>
				<th class="txtcenter">ALIMENT</th>
				<th class="txtcenter">IMAGE</th>
				<th class="txtcenter">ETAT</th>
				<th class="txtcenter">VOIR</th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($aliments as $aliment):?>
			<tr>
				<td class="quizz txtcenter"><?=ucfirst($aliment['name']);?></td>
				<td class="quizz txtcenter"><img class="vignette" src="<?=$this->assetUrl($aliment['urlImg']);?>"></td>
				<td class="quizz txtcenter">
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
				<td class="quizz txtcenter"><a href="<?= $this->url('back_ficheQuizz', ['id'=>$aliment['id']]);?>"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>

			</tr>
		<?php endforeach;?>
		</tbody>

	</table>
<?php $this->stop('main_content') ?>
