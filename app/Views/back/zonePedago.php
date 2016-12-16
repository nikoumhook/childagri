<?php $this->layout('back', ['title' => 'Administrer vos contenus pedagogiques']) ?>

<?php $this->start('head') ?>

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

			<h1 class="txtcenter"> Administrer le contenu pedagogique</h1>

			<div class="grid-2 flex-container-v">

				<div class="bloc1">


					<label for="aliment" class="labelPedago"> Choisissez l'aliment de votre contenu pedagogique</label><br>
						<select name="aliment" class="">
	  						<option value="" selected disable>Liste des aliments</option>
	  							<?php foreach ($aliments as $aliment) :?>
                                    <?php if (!in_array($aliment['id'],$alimentsAssoc)): ?>
                                        <option value="<?= $aliment['id'];?>"> <?= ucfirst($aliment['name']);?></option>
                                    <?php else : ?>
                                        <option value="<?= $aliment['id'];?>" disabled> <?= ucfirst($aliment['name']);?></option>
                                    <?php endif; ?>
	  							<?php endforeach ;?>
						</select>
						<br>

				<!-- 	<label for="land" class="labelPedago one-third">Choisissez la région de production de votre aliment</label><br>
						<select name="land" class="two-third">
	  						<option value="" selected disable>Liste des régions</option>
	  							<php foreach ($lands as $land) :?>
	  								<option value="<= $land['id'];?>"> <= ucfirst($land['publicName']);?></option>
	  							<?php //endforeach ;?>
						</select>
						<br> -->

					<label for="publish" class="labelPedago"> Publier votre contenu</label><br>
						<input type="radio" name="publish" value="oui" checked> OUI je le publie<br>
	  					<input type="radio" name="publish" value="non"> NON je l'enregistre en brouillon<br>


				</div> <!-- fermeture bloc1 -->


				<div class="bloc2">

					<label for="content" class="labelPedago">Contenu pédagogique</label>
						<textarea id="content" class="inputPedago two-third" type="text" name="content" placeholder="Ex: Le lait">
						</textarea>

					<br>
					<label for="picture" class="labelPedago">Illustration</label>
						<input id="picture" class="inputPedago two-third" type="file" name="picture" class="" accept="image/*" value="">
					<br>

					<label for="sound" class="labelPedago">Piste audio</label>
						<input id="sound" class="inputPedago two-third" type="file" name="sound" class="" accept=".mp3" value="">

				</div> <!--  fermeture bloc2 -->

				<!-- Bouton -->
				<div class="center flex_container-v">
					<button type="submit" class="">ENREGISTRER</button>
				</div>

			</div> <!--  fermeture div Grid2 -->


		</form>

<?php $this->stop('main_content') ?>
