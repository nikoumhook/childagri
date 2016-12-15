<?php $this->layout('back', ['title' => 'Administrer vos quizz']) ?>

<?php $this->start('head') ?>
	<!-- Style -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/backPedago.css') ?>">
<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


		<h1 class="txtcenter"> Administrer le quizz de chaque aliment</h1>


		<label for="aliment" class="labelPedago one-third"> Choisissez l'aliment de votre quizz</label>
		<br>
			<select id="aliment" name="aliment" class="two-third">
	  			<option value="" selected disable>Liste des aliments</option>
	  				<?php foreach ($aliments as $aliment) :?>

    	  				<option value="<?= $aliment['id'];?>"> <?= ucfirst($aliment['name']);?></option>
	  				<?php endforeach ;?>
			</select>
		<br>


		<div class="grid-4 flex-container-v">

			<div class="bloc1">
				<form id="formQuestion1">
					<h2>Renseigner la première question de votre quizz</h2>
					<label for="question1" class="one-third">Question 1</label>
					<textarea id="question1" type="text" name="question"></textarea>

					<label for="answer1" class="one-third">Réponse</label><br>
					<input type="radio" name="answer" value="oui" > La réponse est OUI<br>
	  				<input type="radio" name="answer" value="non" checked> La réponse est NON<br>
	  				<input type="text" id="ExplainAnswer" name="ExplainAnswer" class="">

					<!-- Bouton -->
					<div class="center flex_container-v">
						<button id="validQuestion1" type="submit" class="">ENREGISTRER</button>
					</div>

					<!-- div Affichage resultat traitement AJAX CONNEXION-->
					<div id="resultQuestion1" class="result txtcenter"></div>
				</form>
			</div>

			<div class="bloc2">
				<form id="formQuestion2">
					<h2>Renseigner la deuxième question de votre quizz</h2>
					<label for="question2" class="one-third">Question 2</label>
					<textarea id="question2" type="text" name="question"></textarea>

					<label for="answer2" class="one-third">Réponse</label><br>
					<input type="radio" name="answer" value="oui" checked> La réponse est OUI
					<br>
	  				<input type="radio" name="answer" value="non"> La réponse est NON
	  				<br>
	  				<input type="text" id="ExplainAnswer" name="ExplainAnswer" class="">

	  				<!-- Bouton -->
					<div class="center flex_container-v">
						<button id="validQuestion2" type="submit" class="">ENREGISTRER</button>
					</div>

					<!-- div Affichage resultat traitement AJAX CONNEXION-->
					<div id="resultQuestion2" class="result txtcenter"></div>
				</form>
			</div>

			<div class="bloc3">
				<form id="formQuestion3">
					<h2>Renseigner la troisième question de votre quizz</h2>
					<label for="question3" class="one-third">Question 3</label>
					<textarea id="question3" type="text" name="question"></textarea>

					<label for="answer3" class="one-third">Réponse</label><br>
					<input type="radio" name="answer" value="oui" checked> La réponse est OUI
					<br>
	  				<input type="radio" name="answer" value="non"> La réponse est NON
	  				<br>
	  				<input type="text" id="ExplainAnswer" name="ExplainAnswer" class="">

	  				<!-- Bouton -->
					<div class="center flex_container-v">
						<button id="validQuestion3" type="submit" class="">ENREGISTRER</button>
					</div>

					<!-- div Affichage resultat traitement AJAX CONNEXION-->
					<div id="resultQuestion3" class="result txtcenter"></div>
				</form>
			</div>


			<div class="bloc4">
				<form id="formQuestion4">
					<h2>Renseigner la quatrième question de votre quizz</h2>
					<label for="question4" class="one-third">Question 4</label>
					<textarea id="question4" type="text" name="question"></textarea>

					<label for="answer4" class="one-third">Réponse</label><br>
					<input type="radio" name="answer" value="oui" checked> La réponse est OUI
					<br>
	  				<input type="radio" name="answer" value="non"> La réponse est NON
	  				<br>
	  				<input type="text" id="ExplainAnswer" name="ExplainAnswer" class="">

	  				<!-- Bouton -->
					<div class="center flex_container-v">
						<button id="validQuestion4" type="submit" class="">ENREGISTRER</button>
					</div>

					<!-- div Affichage resultat traitement AJAX CONNEXION-->
					<div id="resultQuestion3" class="result txtcenter"></div>
				</form>
			</div>


		</div> <!-- fermeture grid4 -->



<!-- Script appel Jquery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>


<!-- Script Affichage validation  -->
<script>
	var nbrQuestion = 0;
	$(document).ready(function(){
		var controlAjax = function(thiz){
				var form = $(thiz).parent().parent();


				$.ajax({
					url: '<?=$this->url('ajax_quizz');?>',
					type:'post',
					cache:false,
					data: {
						aliment : $('#aliment').val() ,
						question : $(form).children('textarea').val(),
						answer : $(form).children('input:checked').val(),
						ExplainAnswer : $(form).children('input[type="text"]').val()
					},
					dataType: 'json',
					success: function(result){
						if(result.code == 'valid'){
							$(form).children('.result').html('<div class="">' + result.msg +'</div>');
							nbrQuestion++;
							if (nbrQuestion==4) {
								$(location).attr('href', '<?= $this->url('back_quizz');?>');
							}
						}
						else if(result.code =='error'){
							$(form).children('.result').html('<div class="">' + result.msg +'</div>');
						}
					}//fermeture success
				});//fermeture $.ajax

		};

		$('#formQuestion1').children('.center').children('button').click(function(e){
			e.preventDefault();
			controlAjax($(this));

		});
		$('#formQuestion2').children('.center').children('button').click(function(e){
			e.preventDefault();
			controlAjax($(this));

		});
		$('#formQuestion3').children('.center').children('button').click(function(e){
			e.preventDefault();
			controlAjax($(this));

		});
		$('#formQuestion4').children('.center').children('button').click(function(e){
			e.preventDefault();
			controlAjax($(this));

		});

	});//fermeture document.ready
</script>

<!-- Script Affichage validation question 2 -->



<!-- Script Affichage validation question 3 -->


<!-- Script Affichage validation question 4 -->




<?php $this->stop('main_content') ?>
