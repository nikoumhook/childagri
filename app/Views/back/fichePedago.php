<?php $this->layout('back', ['title' => 'Pedago de '.ucfirst($pedago['ingredient'])]) ?>

<?php $this->start('head') ?>



<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>

	<?php if (empty($pedago)) :?>
		<div class=""> Contenu pédagogique inconnu</div>
	<?php endif;?>


		<!-- affichage des messages d'erreur -->
		<?php if (isset($errors) && !empty($errors)):?>
		<div class=""><?=implode('<br>', $errors);?></div>
		<?php endif;?>

		<?php if (isset($success) && $success == true):?>
		<div class="">Bravo votre contenu pedagogique a bien été mis à jour</div>
		<?php endif;?>

	<form method="POST" enctype="multipart/form-data">

		<h1 class="txtcenter"> Modifier le contenu pédagogique de : <br> <?=ucfirst($pedago['ingredient']);?> de la région <?=ucfirst($pedago['region']);?></h1>

		<div class="grid-3">

			<div class="bloc1">

				<input type="hidden" value="<?= $pedago['id'];?>" name="id">

				<label for="pedago">Texte du contenu pédagogique</label>
				<br>
				<textarea id="pedago" class="tinyChildAgri" name="content" ><?=$pedago['content'];?></textarea>
				<br>

				<label for="publish" class="labelAliment labelPedago">Etat actuel de publication</label>
				<br>
				<input type="radio" name="publish" value="oui" <?=($pedago['publish']=='oui')? 'checked': '';?>> Publié<br>
	  			<input type="radio" name="publish" value="non" <?=($pedago['publish']=='non')? 'checked': '';?>> En brouillon<br>
			</div><!--  fermeture bloc 1 -->

			<div class="bloc2">

				<label for="audio">Piste audio actuelle</label>
				<br>
				<audio controls="controls">
	  				<source src="<?=$this->assetUrl($pedago['urlSound']);?>" type="audio/mp3" >
				</audio>
				<br>

				<label for="sound" class="labelPedago">Modifier votre piste audio</label>
				<input id="sound" class="inputPedago two-third" type="file" name="sound" class="" accept=".mp3">

			</div> <!-- fermeture bloc 2 -->

			<div class="bloc3">

				<label for="audio">Votre image actuelle</label>
				<br>
				<img src="<?=$this->assetUrl($pedago['urlImg']);?>">
				<br>

				<label for="picture" class="">Modifier votre image</label>
				<br>
				<input id="picture" class="inputAliment" type="file" name="picture" class="" accept="image/*" value="">
				<br>

			</div> <!-- fermeture bloc 3 -->


			<!-- Bouton -->
				<div class="center flex_container-v">
					<button type="submit" class="">ENREGISTRER LES MODIFICATIONS</button>
				</div>

		</div> <!-- fermeture de mon grid2 -->

	</form>


<?php $this->stop('main_content') ?>
