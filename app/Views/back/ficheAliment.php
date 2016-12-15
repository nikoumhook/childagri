<?php $this->layout('back', ['title' => 'Fiche de ' .ucfirst($aliment['name'])]) ?>

<?php $this->start('head') ?>
	<!-- Style Knacss -->
	<link rel="stylesheet" href="<?=$this->assetUrl('css/knacss.css');?>">
	<!-- Style -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/backPedago.css') ?>">
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

		<h1 class="txtcenter"> Modifier <?=ucfirst($aliment['name']);?></h1>

		<div class="grid-2">

			<div class="bloc1">

				<input type="hidden" value="<?= $aliment['id'];?>" name="id">

				<label for="aliment" class="labelAliment">Nom de l'aliment</label>
				<br>
				<input id="aliment" class="inputAliment" type="text" name="aliment" value="<?= ucfirst($aliment['name']);?>">
				<br>

				<label class="labelAliment">Votre image actuelle</label>
				<br>
				<img src="<?= $this->assetUrl($aliment['urlImg']);?>">
				<br>

				<label for="picture" class="labelAliment">Modifier votre image</label>
				<br>
				<input id="picture" class="inputAliment" type="file" name="picture" class="" accept="image/*" value="">
				<br>

				<label for="land" class="labelAliment">Région de production de votre aliment</label>
				<br>

				<select name="land" class="">
  					<?php foreach ($lands as $land) :?>
  						<option value="<?= $land['id'];?>"<?=($land['id']==$aliment['id_land'])? 'selected': '';?>> <?= ucfirst($land['publicName']);?></option>
  					<?php endforeach ;?>
				</select>
				<br>
				
			</div> <!-- fermeture bloc 1 -->


			<div class="bloc2">
                <label>Repas associé

                    <br>
                    <label for="repas1">repas 1 </label>
                    <input id="repas1" name="repas1" type="checkbox" value="oui" <?=($aliment['repas1']=='oui')? 'checked': '';?>>

                    <label for="repas2">| repas 2</label>
                    <input id="repas2" name="repas2" type="checkbox" value="oui"<?=($aliment['repas2']=='oui')? 'checked': '';?>>

                    <label for="repas3">| repas 3</label>
                    <input id="repas3" name="repas3" type="checkbox" value="oui" <?=($aliment['repas3']=='oui')? 'checked': '';?>>

                    <label for="repas4">| repas 4</label>
                    <input id="repas4" name="repas4" type="checkbox" value="oui" <?=($aliment['repas4']=='oui')? 'checked': '';?>>
                    <br>
                </label>
                <br>

				<label for="publish" class="labelAliment labelPedago">Etat actuel de publication</label>
				<br>
				<input type="radio" name="publish" value="oui" <?=($aliment['publish']=='oui')? 'checked': '';?>> Publié<br>
  				<input type="radio" name="publish" value="non" <?=($aliment['publish']=='non')? 'checked': '';?>> En brouillon<br>

			</div> <!-- fermeture bloc 2 -->

			<!-- Bouton -->
			<div class="center flex_container-v">
				<button type="submit" class="">ENREGISTRER LES MODIFICATIONS</button>
			</div>

		</div><!-- fermeture GRID2 -->


	</form>





<?php $this->stop('main_content') ?>
