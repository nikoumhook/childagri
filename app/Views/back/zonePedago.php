<?php $this->layout('back', ['title' => 'Administrer vos contenus pedagogiques']) ?>

<?php $this->start('head') ?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
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

			<h1 class="titreForm txtcenter">Enregistrer un contenu pedagogique</h1>

			<div class="grid-6 flex-container-v pas">
				<label for="aliment" class="aliment mbs push txtright">CHOISISSEZ</label>
				<select name="aliment" class="mll pull">
	  				<option value="" selected disable>Liste des aliments</option>
                    <?php foreach ($aliments as $aliment) :?>
                        <?php if (!in_array($aliment['id'],$alimentsAssoc)): ?>
                            <option value="<?= $aliment['id'];?>"> <?= ucfirst($aliment['name']);?></option>
                        <?php else : ?>
                            <option value="<?= $aliment['id'];?>" disabled> <?= ucfirst($aliment['name']);?></option>
                        <?php endif; ?>
                    <?php endforeach ;?>
				</select>
			</div> <!-- fermeture Grid6 -->


			<div class="grid-2 flex-container-v">

				<div class="flex-container-v pam">
					<label for="content" class="">Contenu pédago</label>
					<textarea id="content" class="tinychildAgri" type="text" name="content" placeholder="Ex: Le lait">
					</textarea>
				</div>

				<div class="flex-container-v pam">
					<label for="picture" class="">Fichier image</label>
					<div class="">
						<input id="picture" class="pas" type="file" name="picture" accept="image/*" value="">
					</div>
					<div class="ptl">
						<label for="sound" class="">Fichier audio </label><br>
						<input id="sound" class="pas" type="file" name="sound" accept="audio/mpeg3" value="">
					</div>

				</div>
			</div> <!-- fermeture grid 2 -->


			<div class="grid-4 flex-container-v ptm pbs">

				<div class="flex-container-v prm plm txtcenter push">
					<div class="">
						<label for="publish" class="publier pbs"> PUBLIER</label>
					</div>

					<div class="flex-container">
						<div class="left">
							EN LIGNE <input type="radio" name="publish" value="oui" checked>
						</div>

						<div class="right">
	  						<input type="radio" name="publish" value="non"> BROUILLON
	  					</div>
	  				</div>
	  			</div>


				<!-- Bouton -->
				<div class="flex-container-v pull mll">
					<button type="submit" class="bouttonEnregistrer cursor">ENREGISTRER</button>
				</div>

			</div> <!--  fermeture div Grid2 -->


		</form>

<?php $this->stop('main_content') ?>
