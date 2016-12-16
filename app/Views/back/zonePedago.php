<?php $this->layout('back', ['title' => 'Administrer vos contenus pedagogiques']) ?>

<?php $this->start('head') ?>

    <!-- Feuille de style FORMULAIRE BACK -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/formulaire.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>

		<!-- affichage des messages d'erreur -->
		<?php if (isset($errors) && !empty($errors)):?>
		<div class=""><?=implode('<br>', $errors);?></div>
		<?php endif;?>

		<?php if (isset($success) && $success == true):?>
		<div class="">Bravo votre contenu pedagogique a bien été enregistré!</div>
		<?php endif;?>


		<form method="POST" enctype="multipart/form-data">

			<h1 class="txtcenter">Enregistrer un contenu pedagogique</h1>

			<div class="grid-6 pam">
				<label for="aliment" class="push"> Choisissez l'aliment</label>
				<select name="aliment" class="pull">
	  				<option value="" selected disable>Liste des aliments</option>
	  						<?php foreach ($aliments as $aliment) :?>
	  							<option value="<?= $aliment['id'];?>"> <?= ucfirst($aliment['name']);?></option>
	  						<?php endforeach ;?>
				</select>
			</div> <!-- fermeture Grid -->


			<div class="grid-2 flex-container-v zone2">

				<div class="flex-container-v pam">
					<label for="content" class="">Contenu pédago</label>
					<textarea id="content" class="" type="text" name="content" placeholder="Ex: Le lait">
						</textarea>
				</div> <!-- fermeture bloc1 -->

				<div class="flex-container-v pam">
					<div class="pas">
						<label for="picture" class="">Fichier image</label>
						<input id="picture" class="" type="file" name="picture" accept="image/*" value="">
					</div>
					<div class="pas">
						<label for="sound" class="">Fichier audio </label>
						<input id="sound" class="" type="file" name="sound" accept="audio/mpeg3" value="">
					</div>

				</div> <!--  fermeture bloc2 --> 
			</div> <!-- fermeture grid 2 -->


			<div class="grid-4 flex-container-v ptl">

				<div class="flex-container-v push">
					<div class="">
						<label for="publish" class=""> PUBLIER</label>
					</div>
					<div>
						<input type="radio" name="publish" value="oui" checked> En ligne
	  					<input type="radio" name="publish" value="non"> Brouillon
	  				</div>
	  			</div> <!-- fermeture bloc3 -->

				<!-- Bouton -->
				<div class="flex-container-v pull">
					<button type="submit" class="bouttonEnregistrer">ENREGISTRER</button>
				</div> <!-- femeture bloc4 -->

			</div> <!--  fermeture div Grid2 --> 


		</form>

<?php $this->stop('main_content') ?>