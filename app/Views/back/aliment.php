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

		<h1 class="titreForm txtcenter pam">Enregistrer un aliment</h1>

		<div class="grid-3 flex-container flex-container-v">
			<div class="pam flex-container-v push">
				<label for="aliment" class="">Nom</label>
				<input id="aliment" class="pas" type="text" name="aliment" placeholder="Ex: tomate">
			</div>


			<div class="pam flex-container-v pull">
				<label for="land" class="">Région de production</label>
				<select name="land" class="pas">
  					<option value="" selected disable>Liste des régions</option>
  						<?php foreach ($lands as $land) :?>
  						<option value="<?= $land['id'];?>"> <?= ucfirst($land['publicName']);?></option>
  						<?php endforeach ;?>
				</select>
			</div>

		</div>

		<div class="grid-3 flex-container flex-container-v">

			<div class="pam flex-container-v push">
				<label for="picture" class="">Image</label>
				<input id="picture" class="pas" type="file" name="picture" class="" accept="image/*" value="">
			</div>

			<div class="pam flex-container-v pull">

                <div class="flex-container-v">

                	<label class="txtleft">Repas</label>

                		<div class="flex-container-v pam repas">

		                 	<div class="flex-container flex-container-v grid-2 pas">
		                    	<div class="nomRepas txtright three-quarter">Petit-Déj</div>
		                    	<input id="repas1" class="one-quarter mts" name="repas1" type="checkbox" value="oui">
		                    </div>

		                    <div class="flex-container flex-container-v grid-2 pas">
		                    	<div class="nomRepas txtright three-quarter">Déjeuner</div>
		                   		<input id="repas2" class="one-quarter mts" name="repas2" type="checkbox" value="oui">
		                    </div>
		                    <div class="flex-container flex-container-v grid-2 pas">
		                    	<div class="nomRepas txtright three-quarter" for="repas3">Goûter</div>
		                    	<input id="repas3" class="one-quarter mts" name="repas3" type="checkbox" value="oui">
		                    </div>
		                    <div class="flex-container flex-container-v grid-2 pas">
		                    	<div class="nomRepas txtright three-quarter" for="repas4">Diner</div>
		                    	<input id="repas4" class="one-quarter mts" name="repas4" type="checkbox" value="oui">
		                    </div>

		                </div>
                </div>
            </div>

        </div><!-- fermeture grid3 -->


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

		</div><!-- fermeture GRID4 -->


	</form>





<?php $this->stop('main_content') ?>
