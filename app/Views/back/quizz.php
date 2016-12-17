<?php $this->layout('back', ['title' => 'Administrer vos quizz']) ?>

<?php $this->start('head') ?>

    <!-- Feuille de style FORMULAIRE BACK -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/formulaire.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


		<h1 class="titreForm txtcenter pbm">Enregistrer un quizz</h1>

		<div class="grid-6 pam">
			<label for="aliment" class="push aliment mbs txtright">CHOISISSEZ</label>
			<select id="aliment" name="aliment" class="mll pull">
	  			<option value="" selected disable>Liste des aliments</option>
	  				<?php foreach ($aliments as $aliment) :?>
    	  			<option value="<?= $aliment['id'];?>" <?= ($aliment['selected'])? 'disabled': '';?>><?= ucfirst($aliment['name']);?></option>
	  				<?php endforeach ;?>
			</select>
		</div> <!-- fermeture grid -->


		<div class="grid-4 flex-container-v">

			<div class="flex-container-v pas">

				<form id="formQuestion1">

					<div class="flex-container-v">
						<label for="question1" class="question txtcenter">Question 1</label>
						<textarea id="question1" name="question" class="tinyChildAgri"></textarea>

						<div class="flex-container-v ptm">
							<label for="answer1" class="reponse pbs txtcenter">Réponse</label>
							<div class="flex-container">
								<div class="left pll">
									OUI <input type="radio" name="answer" value="oui">
								</div>
								<div class="right prl">
	  								<input type="radio" name="answer" value="non" checked> NON
	  							</div>
	  						</div>
	  					</div>

	  					<label for="ExplainAnswer" class="elementReponse txtcenter ptm">Elément réponse</label>
	  					<textarea id="ExplainAnswer" name="ExplainAnswer" class="tinyChildAgri"></textarea>
	  				</div>

					<!-- Bouton -->
					<div class="flex-container-v ptm">
						<button id="validQuestion1" type="submit" class="mam bouttonEnregistrerQuizz">ENREGISTRER</button>
					</div>

					<!-- div Affichage resultat traitement AJAX CONNEXION-->
					<div id="resultQuestion1" class="result txtcenter"></div>

				</form>

			</div> 

			<div class="flex-container-v pas">

				<form id="formQuestion2">

					<div class="flex-container-v">
						<label for="question2" class="question txtcenter">Question 2</label>
						<textarea id="question2" type="text" name="question"></textarea>

						<div class="flex-container-v ptm">
							<label for="answer2" class="reponse pbs txtcenter">Réponse</label>
							<div class="flex-container">
								<div class="left pll">
									OUI <input type="radio" name="answer" value="oui" checked>
								</div>
								<div class="right prl">
	  								<input type="radio" name="answer" value="non"> NON
	  							</div>
	  						</div>
	  					</div>


	  					<label for="ExplainAnswer" class="elementReponse txtcenter ptm">Elément réponse</label>
	  					<textarea id="ExplainAnswer" name="ExplainAnswer" class=""></textarea>

	  				</div>
	  				<!-- Bouton -->
					<div class="center flex-container-v ptm">
						<button id="validQuestion2" type="submit" class="mam bouttonEnregistrerQuizz">ENREGISTRER</button>
					</div>

					<!-- div Affichage resultat traitement AJAX CONNEXION-->
					<div id="resultQuestion2" class="result txtcenter"></div>
				</form>
			</div> <!-- fermeture bloc2 -->

			<div class="flex-container-v pas">

				<form id="formQuestion3">

					<div class="flex-container-v">
						<label for="question3" class="question txtcenter">Question 3</label>
						<textarea id="question3" type="text" name="question"></textarea>

						<div class="flex-container-v ptm">
							<label for="answer3" class="reponse txtcenter pbs">Réponse</label>
							<div class="flex-container">
									<div class="left pll">
									OUI <input type="radio" name="answer" value="oui" checked>
									</div>
									<div class="right prl">
	  									<input type="radio" name="answer" value="non"> NON
	  								</div>
	  						</div>
	  					</div>


	  					<label for="ExplainAnswer" class="elementReponse txtcenter ptm">Elément réponse</label>
	  					<textarea id="ExplainAnswer" name="ExplainAnswer" class=""></textarea>
	  				</div>

	  				<!-- Bouton -->
					<div class="center flex-container-v ptm">
						<button id="validQuestion3" type="submit" class="mam bouttonEnregistrerQuizz">ENREGISTRER</button>
					</div>

					<!-- div Affichage resultat traitement AJAX CONNEXION-->
					<div id="resultQuestion3" class="result txtcenter"></div>
					
				</form>
			</div> <!-- fermeture bloc3 -->


			<div class="flex-container-v pas">

				<form id="formQuestion4">

					<div class="flex-container-v">
						<label for="question4" class="question txtcenter">Question 4</label>
						<textarea id="question4" type="text" name="question"></textarea>

						<div class="flex-container-v ptm">
							<label for="answer4" class="reponse pbs txtcenter">Réponse</label>
							<div class="flex-container">
								<div class="left pll">
									OUI <input type="radio" name="answer" value="oui" checked>
								</div>
								<div class="right prl">
	  								<input type="radio" name="answer" value="non"> NON
	  							</div>
	  						</div>
	  					</div>


	  					<label for="ExplainAnswer" class="elementReponse txtcenter ptm">Elément réponse</label>
	  					<textarea id="ExplainAnswer" name="ExplainAnswer" class=""></textarea>

	  				</div>
	  				<!-- Bouton -->
					<div class="center flex-container-v ptm">
						<button id="validQuestion4" type="submit" class="mam bouttonEnregistrerQuizz">ENREGISTRER</button>
					</div>

					<!-- div Affichage resultat traitement AJAX CONNEXION-->
					<div id="resultQuestion3" class="result txtcenter"></div>
				</form>
			</div> <!-- fermeture bloc 4 -->


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
