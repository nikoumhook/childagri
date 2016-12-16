<?php $this->layout('back', ['title' => 'Administrer vos aliments']) ?>

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
		<div class="">Bravo votre aliment a bien été enregistré!</div>
		<?php endif;?>


	<form method="POST" enctype="multipart/form-data">

		<h1 class="txtcenter">Enregistrer un aliment</h1>

		<div class="grid-4 flex-container flex-container-v">

			<div class="pam flex-container-v">
				<label for="aliment" class="">Nom</label>
				<input id="aliment" class="" type="text" name="aliment" placeholder="Ex: tomate">
			</div> <!-- fermeture bloc1 -->


			<div class="pam flex-container-v">
				<label for="land" class="">Région de production</label>
				<select name="land" class="">
  					<option value="" selected disable>Liste des régions</option>
  						<?php foreach ($lands as $land) :?>
  						<option value="<?= $land['id'];?>"> <?= ucfirst($land['publicName']);?></option>
  						<?php endforeach ;?>
				</select>
			</div> <!-- fermeture bloc2 -->


			<div class="pam flex-container-v">
				<label for="picture" class="">Image</label>
				<input id="picture" class="" type="file" name="picture" class="" accept="image/*" value="">
			</div>  <!-- fermeture bloc3 -->


			<div class="pam flex-container-v">
				<div>
                	<label>Repas </label>
                </div><br>
                    
                 <div>
                    <label for="repas1">Petit-déjeuner </label>
                    <input id="repas1" name="repas1" type="checkbox" value="oui">

                    <label for="repas2">Déjeuner</label>
                    <input id="repas2" name="repas2" type="checkbox" value="oui">
                    
                    <label for="repas3">Goûter</label>
                    <input id="repas3" name="repas3" type="checkbox" value="oui">

                    <label for="repas4">Diner</label>
                    <input id="repas4" name="repas4" type="checkbox" value="oui">
                </div>
             </div> <!-- fermture bloc4 -->

        </div><!-- fermeture grid4 -->


        <div class="grid-4 flex-container flex-container-v ptl">

      		<div class="flex-container-v push">
      			<div class="">
					<label for="publish" class=""> PUBLIER</label>
				</div>
				<div>
					<input type="radio" name="publish" value="oui" checked> En 	ligne
  					<input type="radio" name="publish" value="non"> Brouillon
  				</div>
  			</div> <!-- fermeture bloc5 -->

			<!-- Bouton -->
			<div class="flex-container-v pull">
				<button type="submit" class="bouttonEnregistrer">ENREGISTRER</button>
			</div> <!-- fermeture bloc6 -->

		</div><!-- fermeture GRID2 -->


	</form>





<?php $this->stop('main_content') ?>
