<?php $this->layout('back', ['title' => 'Administrer vos quizz']) ?>

<?php $this->start('head') ?>
	<!-- Style Knacss -->
	<link rel="stylesheet" href="<?=$this->assetUrl('css/knacss.css');?>">
	<!-- Style -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/backPedago.css') ?>">
<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


		
		
	<form method="POST">

		<h1 class="txtcenter"> Administrer le quizz de chaque aliment</h1>

		<label for="aliment" class="labelPedago one-third"> Choisissez l'aliment de votre quizz</label>
		<br>
			<select name="aliment" class="two-third">
	  			<option value="" selected disable>Liste des aliments</option>
	  				<?php foreach ($aliments as $aliment) :?>
	  				<option value="<?= $aliment['id'];?>"> <?= ucfirst($aliment['name']);?></option>
	  				<?php endforeach ;?>
			</select>
		<br>

		<div class="grid-4 flex-container-v">

			<div class="bloc1">
				<h2>Renseigner la première question de votre quizz</h2>
				<label for="question1" class="one-third">Question 1</label>
				<textarea id="question1" type="text" name="question1"></textarea>

				<label for="answer1" class="one-third">Réponse</label><br>
				<input type="radio" name="answer1" value="oui" checked>La réponse est OUI<br>
  				<input type="radio" name="answer1" value="non">La réponse est NON<br>


				<!-- Bouton -->
				<div class="center flex_container-v">
					<button id="validQuestion1" type="submit" class="">ENREGISTRER</button>
				</div>
				
				<!-- div Affichage resultat traitement AJAX CONNEXION-->
				<div id="resultQuestion1" class="txtcenter"></div>


			</div>


			<div class="bloc2">
				<h2>Renseigner la deuxième question de votre quizz</h2>
				<label for="question2" class="one-third">Question 2</label>
				<textarea id="question2" type="text" name="question2"></textarea>

				<label for="answer2" class="one-third">Réponse</label><br>
				<input type="radio" name="answer2" value="oui" checked>La réponse est OUI<br>
  				<input type="radio" name="answer2" value="non">La réponse est NON<br>

  				<!-- Bouton -->
				<div class="center flex_container-v">
					<button id="validQuestion2" type="submit" class="">ENREGISTRER</button>
				</div>
				
				<!-- div Affichage resultat traitement AJAX CONNEXION-->
				<div id="resultQuestion2" class="txtcenter"></div>

			</div>


			<div class="bloc3">
				<h2>Renseigner la troisième question de votre quizz</h2>
				<label for="question3" class="one-third">Question 3</label>
				<textarea id="question3" type="text" name="question3"></textarea>

				<label for="answer3" class="one-third">Réponse</label><br>
				<input type="radio" name="answer3" value="oui" checked>La réponse est OUI<br>
  				<input type="radio" name="answer3" value="non">La réponse est NON<br>

  				<!-- Bouton -->
				<div class="center flex_container-v">
					<button id="validQuestion3" type="submit" class="">ENREGISTRER</button>
				</div>

				<!-- div Affichage resultat traitement AJAX CONNEXION-->
				<div id="resultQuestion3" class="txtcenter"></div>

			</div>


			<div class="bloc4">
				<h2>Renseigner la quatrième question de votre quizz</h2>
				<label for="question4" class="one-third">Question 4</label>
				<textarea id="question4" type="text" name="question4"></textarea>

				<label for="answer4" class="one-third">Réponse</label><br>
				<input type="radio" name="answer4" value="oui" checked>La réponse est OUI<br>
  				<input type="radio" name="answer4" value="non">La réponse est NON<br>

  				<!-- Bouton -->
				<div class="center flex_container-v">
					<button id="validQuestion4" type="submit" class="">ENREGISTRER</button>
				</div>

				<!-- div Affichage resultat traitement AJAX CONNEXION-->
				<div id="resultQuestion3" class="txtcenter"></div>

			</div>


		</div> <!-- fermeture grid4 -->

	</form>

<!-- Script appel Jquery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>


<!-- Script Affichage validation question 1 -->
<script>
	$(document).ready(function(){
		$('#validQuestion1').click(function(e){
			e.preventDefault();
			$.ajax({
				url: '<?=$this->url('ajax_connexion');?>',
				type:'post',
				cache:false,
				data: $('#FormConnect').serialize(),
				dataType: 'json',
				success: function(result){
					if(result.code == 'valid'){
						$('#resultConnect').html('<div class="infoReussite">' + result.msg +'</div>');
					}
				}//fermeture success
			});//fermeture $.ajax
		});// fermeture buttton clic
	});//fermeture document.ready
</script>



<?php $this->stop('main_content') ?>