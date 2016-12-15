<?php $this->layout('back', ['title' => 'Administrer vos aliments']) ?>

<?php $this->start('head') ?>


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

		<h1 class="txtcenter"> Administrer les aliments</h1>

		<div class="grid-2 flex-container-v">

			<div class="bloc1 center">
				<label for="aliment" class="labelAliment one-third">Nom de l'aliment</label>
				<br>
				<input id="aliment" class="inputAliment two-third" type="text" name="aliment" placeholder="Ex: tomate">
				<br>

				<label for="land" class="labelAliment one-third">Choisissez la région de production de votre aliment</label><br>
				<select name="land" class="two-third">
  					<option value="" selected disable>Liste des régions</option>
  						<?php foreach ($lands as $land) :?>
  						<option value="<?= $land['id'];?>"> <?= ucfirst($land['publicName']);?></option>
  						<?php endforeach ;?>
				</select>
				<br>

				<label for="picture" class="labelAliment one-third">Image</label>
				<input id="picture" class="inputAliment two-third" type="file" name="picture" class="" accept="image/*" value="">
				<br>

			</div> <!-- fermeture bloc 1 -->


			<div class="bloc2 center">
                <label>Choix du repas associé
                    <br>
                    <label for="repas1">repas 1 </label>
                    <input id="repas1" name="repas1" type="checkbox" value="oui">

                    <label for="repas2">| repas 2</label>
                    <input id="repas2" name="repas2" type="checkbox" value="oui">

                    <label for="repas3">| repas 3</label>
                    <input id="repas3" name="repas3" type="checkbox" value="oui">

                    <label for="repas4">| repas 4</label>
                    <input id="repas4" name="repas4" type="checkbox" value="oui">
                    <br>
                </label>

				<label for="publish" class="labelAliment labelPedago one-third"> Publier votre aliment</label>
				<br>
				<input type="radio" name="publish" value="oui" checked> OUI je le publie<br>
  				<input type="radio" name="publish" value="non"> NON je l'enregistre en brouillon<br>

			</div> <!-- fermeture bloc 2 -->

		</div><!-- fermeture GRID2 -->

		<!-- Bouton -->
		<div class="center flex_container-v">
			<button type="submit" class="">ENREGISTRER</button>
		</div>

	</form>





<?php $this->stop('main_content') ?>
