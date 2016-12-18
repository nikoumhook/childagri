<?php $this->layout('back', ['title' => 'Fiche de ' .ucfirst($aliment['name'])]) ?>

<?php $this->start('head') ?>

    <!-- Feuille de style FICHE BACK -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/fiche.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>

		<?php if (empty($aliment)) :?> 
			<div class=""> Aliment inconnu</div>
		<?php endif;?>

		<!-- affichage des messages d'erreur -->
		<?php if (isset($errors) && !empty($errors)):?>
		<div class=""><?=implode('<br>', $errors);?></div>
		<?php endif;?>

		<?php if (isset($success) && $success == true):?>
		<div class="">Bravo votre aliment a bien été mis à jour</div>
		<?php endif;?>


	<form method="POST" enctype="multipart/form-data">

		<h1 class="titreFiche txtcenter">Fiche du <?=$aliment['name'];?></h1>

		<div class="grid-6 pas">

			<input id="aliment" type="hidden" class="mas" value="<?= $aliment['id'];?>" name="id">

			<label for="aliment" class="mbs prs push txtright">Nom</label>
			<input id="aliment" class="pas pull" type="text" name="aliment" value="<?= ucfirst($aliment['name']);?>">
		
		</div> <!-- fermeture grid6 -->

		
		<div class="grid-2 flex-container-v">

			<div class="pas txtright">
				<label for="picture" class="pbs">Votre image</label><br>
				<img src="<?= $this->assetUrl($aliment['urlImg']);?>" alt="">
			</div>

			<div class="pas txtleft">
				<label for="land" class="pbs ">Région de production</label><br>
				<select name="land" class="pas">
  					<?php foreach ($lands as $land) :?>
  						<option value="<?= $land['id'];?>"<?=($land['id']==$aliment['id_land'])? 'selected': '';?>> <?= ucfirst($land['publicName']);?></option>
  					<?php endforeach ;?>
				</select>
			</div>
			
		</div> <!-- fermeture grid2 -->


		<div class="grid-3 flex-container flex-container-v">

			<div class="pas flex-container-v push">
				<label for="picture" class="pbs">Modifier votre image</label>
				<input id="picture" class="pas" type="file" name="picture" class="" accept="image/*" value="">
			</div>

	
			<div class="pas flex-container-v pull">

				<div class="flex-container-v">

					<label class="txtleft pbs">Repas</label>

	                	<div class="flex-container-v pas repas">

			                <div class="flex-container flex-container-v grid-2 pas">
	                    		<div class="nomRepas txtright three-quarter">Petit-Déj</div>
	                    		<input id="repas1" class="one-quarter mts" name="repas1" type="checkbox" value="oui" <?=($aliment['repas1']=='oui')? 'checked': '';?>>
	                    	</div>
			                   
			                <div class="flex-container flex-container-v grid-2 pas">
	                    		<div class="nomRepas txtright three-quarter">Déjeuner</div>
	                    		<input id="repas2" class="one-quarter mts" name="repas2" type="checkbox" value="oui"<?=($aliment['repas2']=='oui')? 'checked': '';?>>
	 						</div>

			                <div class="flex-container flex-container-v grid-2 pas">
			                    <div class="nomRepas txtright three-quarter" for="repas3">Goûter</div>
								<input id="repas3" class="one-quarter mts" name="repas3" type="checkbox" value="oui" <?=($aliment['repas3']=='oui')? 'checked': '';?>>
	  						</div>

			                <div class="flex-container flex-container-v grid-2 pas">
			                    <div class="nomRepas txtright three-quarter" for="repas4">Diner</div>
	                    		<input id="repas4" class="one-quarter mts" name="repas4" type="checkbox" value="oui" <?=($aliment['repas4']=='oui')? 'checked': '';?>>
	                    	</div>
	                    </div>
            	</div>
            </div>
       	</div><!-- fermeture grid3 -->
                    
                
     	<div class="grid-4 flex-container-v ptm pbs">

      		<div class="flex-container-v prn plm txtcenter push">
      			<div class="">
					<label for="publish" class="publier pbs"> PUBLIER</label>
				</div>

				<div class="flex-container">
					<div class="right prs">
						EN LIGNE <input type="radio" name="publish" value="oui" <?=($aliment['publish']=='oui')? 'checked': '';?>> 
					</div>
					<div class="left pls">
						<input type="radio" name="publish" value="non" <?=($aliment['publish']=='non')? 'checked': '';?>> BROUILLON
					</div>
				</div>
			</div>


			<!-- Bouton -->
			<div class="flex-container-v pull mll">
				<button type="submit" class="bouttonEnregistrer">MODIFIER</button>
			</div>

		</div> <!-- fermeture Grid4 -->


	</form>





<?php $this->stop('main_content') ?>
