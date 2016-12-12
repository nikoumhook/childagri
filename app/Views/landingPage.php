<!DOCTYPE html>
<html lang="fr">


<head>
	<title>Page accueil</title>

<!-- Style simple Genius -->
<link rel="stylesheet" href="<?= $this->assetUrl('css/simpleGenie.css') ?>">
<!-- Script simple Genius -->
<script src="<?= $this->assetUrl('js/modernizr.custom.js') ?>"></script>

<!-- Style Knacss -->
<link rel="stylesheet" href="<?=$this->assetUrl('css/knacss.css');?>">

<!-- Mon style -->
<link rel="stylesheet" href="<?=$this->assetUrl('css/landingPage.css');?>">





</head>


<body>

</body>

	<!-- DIV grand wrapper --> 
	<div id="wrapper" class="backgroundLanding">

		<!-- Div explication -->
		<div id="explainLanding"> <h1>Joue et découvre ce que tu manges tous les jours !</h1></div>

		<!-- Button play -->
		<button id="trigger-overlay" type="button" class="overlay">ON JOUE</button>


		<!-- Div POPIN -->
		<div id="log" class="overlay overlay-simplegenie"">

			<!-- Bouton fermeture de la div simple genius-->
			<button type="button" class="overlay-close">Fermer</button>

			<!-- Div wrapper formulaire Popin: 2 grid -->
			<div class="grid-2 wrapperPopin">

				<!-- Div formulaire connexion Popin -->
				<div id="connexion">
					<h2 class="txtcenter"> Connecte toi pour jouer</h2>


					<form id="FormConnect" class="login" action="#">

						<!-- div Affichage resultat traitement AJAX CONNEXION-->
						<div id="resultConnect" class="txtcenter"></div> 

						<!-- formulaire connexion-->
						<label for="usernameC" class="labelLanding txtleft">Ton pseudo</label>
						<input id="usernameC" class="inputLanding" type="text" name="username" placeholder="Maxou33" required>
						<br>


						<label for="passwordC" class="labelLanding txtleft">Ton mot de passe</label>
						<input id="passwordC" class="inputLanding" type="password" name="passwordconnect" placeholder="UnMot2PassSecret33" required>
						<br>

						<button id="validConnexion" type="submit">SE CONNECTER POUR JOUER</button>
						
					</form>
				</div>

				<!-- Div formulaire inscription Popin -->
				<div id="inscription">
					<h2 class="txtcenter titrePopinLanding"> Inscris toi pour jouer</h2>


					<form class="subscribe" action="#">

						<!-- div Affichage resultat traitement AJAX INSCRIPTION-->
						<div id="resultInscription" class="center"></div> 

						<!-- formulaire iscription-->
						<label for="firstname" class="labelLanding txtleft">Ton prénom</label>
						<input id="firstname" class="inputLanding" type="text" name="firstname" placeholder="Ex: Maxime">
						<br>

						<label for="lastname" class="labelLanding txtleft">Ton nom</label>
						<input id="lastname" class="inputLanding" type="text" name="lastname" placeholder="Segol" >
						<br>


						<label for="username" class="labelLanding txtleft">Ton pseudo</label>
						<input id="username" class="inputLanding" type="text" name="username" placeholder="Maxou33">
						<br>


						<label for="password" class="labelLanding txtleft">Ton mot de passe</label>
						<input id="password" class="inputLanding" type="password" name="password" placeholder="UnMot2PassSecret33">
						<br>


						<label for="passwordVerify" class="labelLanding txtleft">Ton mot de passe pour le vérifier</label>
						<input id="passwordVerify" class="inputLanding" type="password" name="passwordVerify" placeholder="UnMot2PassSecret33">
						<br>


						<label for="mail" class="labelLanding">Ton mail</label>
						<input id="mail" class="inputLanding" type="mail" name="mail" placeholder="maxS@gmail.com">
						<br>

						<div class="">
                   		 L'adresse mail n'est pas obligatoire mais elle te pemettra de récupérer ton mot de passe si tu l'oublies !</div>

						<button id="validInscription" type="submit">S'INSCRIRE POUR JOUER</button>
						
					</form>

				</div> <!-- fermeture de la div inscription -->
			</div> <!-- fermeture de la div wrapper de la popin -->
		</div> <!-- fermeture de la popin -->


	</div> <!-- fermeture du wrapper -->

<!-- Script simple genius Popin -->
<script src="<?= $this->assetUrl('js/classie.js') ?>"></script>
<script src="<?= $this->assetUrl('js/demo1.js')?>"></script>

<!-- Script appel Jquery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

<!-- Script Affichage validation formulaire inscription en Ajax -->
<script>
	$(document).ready(function(){
		$('#validInscription').click(function(e){
			e.preventDefault();
			$.ajax({
				url: '<?=$this->url('ajax_inscription');?>',
				type:'post',
				cache:false,
				data: $('form').serialize(),
				dataType: 'json',
				success: function(result){
					if(result.code == 'valid'){
						$('#resultInscription').html('<div>' + result.msg +'</div>');
					}
					else if(result.code =='error'){
						$('#resultInscription').html('<div>' + result.msg +'</div>');
					}
				}//fermeture success
			});//fermeture $.ajax
		});// fermeture buttton clic
	});//fermeture document.ready
</script>


<!-- Script Affichage validation formulaire connexion en Ajax -->
<script>
	$(document).ready(function(){
		$('#validConnexion').click(function(e){
			e.preventDefault();
			$.ajax({
				url: '<?=$this->url('ajax_connexion');?>',
				type:'post',
				cache:false,
				data: $('#FormConnect').serialize(),
				dataType: 'json',
				success: function(result){
					if(result.code == 'valid'){
						$('#resultConnect').html('<div>' + result.msg +'</div>');
					}
				}//fermeture success
			});//fermeture $.ajax
		});// fermeture buttton clic
	});//fermeture document.ready
</script>





</html>
