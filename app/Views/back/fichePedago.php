<?php $this->layout('back', ['title' => 'Pedago de '.ucfirst($pedago['ingredient'])]) ?>

<?php $this->start('head') ?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
    <!-- Feuille de style FICHE BACK -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/fiche.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>

	<?php if (empty($pedago)) :?>
		<div class=""> Contenu pédagogique inconnu</div>
	<?php endif;?>


		<!-- affichage des messages d'erreur -->
		<?php if (isset($errors) && !empty($errors)):?>
		<div class="pas erreur"><?=implode('<br>', $errors);?></div>
		<?php endif;?>

		<?php if (isset($success) && $success == true):?>
		<div class="pas success">Bravo votre contenu pedagogique a bien été mis à jour</div>
		<?php endif;?>

	<form method="POST" enctype="multipart/form-data">

		<h1 class="titreFiche txtcenter pam">Contenu pédagogique du <?=strtolower($pedago['ingredient']);?> de  <?=ucfirst($pedago['region']);?></h1>

		<div class="grid-2 flex-container-v">

			<input type="hidden" value="<?= $pedago['id'];?>" name="id">

			<div class="flex-container-v pam">
				<div>
					<label class="man pbs" for="audio">Image</label><br>
					<img src="<?=$this->assetUrl($pedago['urlImg']);?>">
				</div>
				<div>
					<label class="man ptl pbs" for="audio">Piste audio</label><br>
					<audio controls="controls">
		  				<source src="<?=$this->assetUrl($pedago['urlSound']);?>" type="audio/mp3" >
					</audio>
				</div>
				<div class="txtright">
					<label class="man pts pbs" for="picture" class="">Modifier votre image</label><br>
					<input id="picture" class="pas" type="file" name="picture" class="" accept="image/*" value="">
				</div>
				<div class="txtright">
					<label class="man pbs ptl" for="sound" class="labelPedago">Modifier votre piste audio</label><br>
					<input id="sound" class="pas" type="file" name="sound" class="" accept=".mp3">
				</div>
			</div>

			<div class="flex-container-v pam">
					<label class="man" for="pedago">Contenu pédagogique</label><br>
					<textarea id="pedago" class="txtAreaFiche tinyChildAgri" name="content" ><?=$pedago['content'];?>
					</textarea>
			</div>

		</div> <!-- fermeture grid2 -->



		<div class="grid-4 flex-container-v ptm pbs">

			<div class="flex-container-v prn plm txtcenter push">
				<div class="">
					<label for="publish" class="publier pbs"> PUBLIER</label>
				</div>

				<div class="flex-container">
					<div class="right prs">
						EN LIGNE <input type="radio" class="pas" name="publish" value="oui" <?=($pedago['publish']=='oui')? 'checked': '';?>>
					</div>
					<div class="left pls">
			  			<input type="radio" class="pas" name="publish" value="non" <?=($pedago['publish']=='non')? 'checked': '';?>> BROUILLON
			  		</div>
			  	</div>
			</div>

			<!-- Bouton -->
			<div class="flex-container-v pull mll cursor">
				<button type="submit" class="bouttonEnregistrer cursor">MODIFIER</button>
			</div>

		</div> <!-- fermeture de grid4 -->


	</form>


<?php $this->stop('main_content') ?>
