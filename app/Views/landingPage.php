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
    <link rel="stylesheet" href="<?= $this->assetUrl('css/popinFormulaireFront.css') ?>">

</head>

<body>


	<!-- DIV grand wrapper -->
	<div id="wrapper" class="backgroundLanding">

		<!-- Div explication -->
		<div id="explainLanding">
			<h1 class="txtcenter titreLanding">Amuse toi à découvrir ce que tu manges tous les jours !</h1>
		</div>

		<!-- Button play -->
		<button id="trigger-overlay" type="button" class="overlay">ON JOUE</button>


		<!-- Div POPIN -->
		<div id="log" class="overlay overlay-simplegenie">

			<!-- Bouton fermeture de la div simple genius-->
			<button type="button" class="overlay-close">Fermer</button>

			<!-- Div wrapper formulaire Popin: 2 grid -->
			<div class="grid-2 wrapperPopin flex-container-v pam">

				<!-- Div formulaire connexion Popin -->
				<div id="connexion" class="bloc1 flex-container-v">

					<div class="flex-container pam">

						<h2 class="txtcenter pam titreConnect"> Connecte toi</h2>
						<form id="FormConnect" class="flex-item-center" action="#">

							<!-- <div class="grid-2 flex-item-center"> -->
								<!-- <label for="usernameC" class="labelLanding one-third">Ton pseudo</label> -->
								<input id="usernameC" class="" type="text" name="username" placeholder="TON PSEUDO" required>
							<!-- </div>
 -->
							<!-- <div class="grid-2 flex-item-center"> -->
								<!-- <label for="passwordC" class="labelLanding one-third">Ton mot de passe</label -->>
								<input id="passwordC" class="" type="password" name="passwordconnect" placeholder="TON MOT DE PASSE" required>
							<!-- </div> -->

							<div id="buttonConnexion" class="grid">
								<button id="validConnexion" type="submit">SE CONNECTER POUR JOUER</button>
							</div>

							<!-- div Affichage resultat traitement AJAX CONNEXION-->
							<div id="resultConnect" class="txtcenter"></div>

						</form>
					</div>
				</div> <!-- fermeture bloc1 -->

				<!-- Div formulaire inscription Popin -->
				<div id="inscription" class="bloc2 center flex-container-v">
					<h2 class="txtcenter pam titreConnect"> Inscris toi</h2>
					<form class="flex-item-center" action="#">

						<!-- formulaire iscription-->
						<div class="grid-2 flex-item-center">
							<label for="firstname" class="labelLanding one-third">Ton prénom</label>
							<input id="firstname" class="inputLanding two-third" type="text" name="firstname" placeholder="Ex: Maxime">

							<label for="lastname" class="labelLanding one-third">Ton nom</label>
							<input id="lastname" class="inputLanding two-third" type="text" name="lastname" placeholder="Ex:Segol" >
						</div>

						<div class="grid-2 flex-item-center">
							<label for="username" class="labelLanding one-third">Ton pseudo</label>
							<input id="username" class="inputLanding" type="text" name="username" placeholder="Ex:Maxou33">

							<label for="password" class="labelLanding one-third">Ton mot de passe</label>

							<input id="password" class="inputLanding two-third" type="password" name="password" placeholder="Ex: unMot2PassSecret">


							<label for="passwordVerify" class="labelLanding one-third">Ton mot de passe (encore)</label>
							<input id="passwordVerify" class="inputLanding two-third" type="password" name="passwordVerify" placeholder="Ex: unMot2PassSecret">
						</div>

						<div class="grid-1 flex-item-center">
							L'adresse mail n'est pas obligatoire.<br>
							Mais elle te pemettra de récupérer ton mot de passe si tu l'oublies !
						</div>

						<div class="grid-2 flex-item-center">
							<label for="mail" class="labelLanding one-third">Ton mail</label>
							<input id="mail" class="inputLanding three-quarter" type="mail" name="mail" placeholder="Ex: max.s@gmail.com">
						</div>

						<div id="buttonSubscribe" class="grid">
							<button id="validInscription" type="submit">S'INSCRIRE POUR JOUER</button>
						</div>

						<!-- div Affichage resultat traitement AJAX INSCRIPTION-->
						<div id="resultInscription" class="center"></div>

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
                        $('#buttonSubscribe').html('');
						$('#resultInscription').html('<div class="infoReussite">' + result.msg +'</div>');

                        setInterval(function(){
                            $(location).attr('href','<?= $this->url('game_startPlay'); ?>');
                        },3000);
					}
					else if(result.code =='error'){
						$('#resultInscription').html('<div class="infoErreur">' + result.msg +'</div>');
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
				type: 'post',
				cache:false,
				data: $('#FormConnect').serialize(),
				dataType: 'json',
				success: function(result){
					if(result.code == 'valid'){

                        $('#buttonConnexion').html('');
						$('#resultConnect').html('<div class="infoReussite">' + result.msg +'</div>');
                        setInterval(function(){
                            $(location).attr('href','<?= $this->url('game_startPlay'); ?>');
                        },3000);

					}else if(result.code =='error'){
						$('#resultConnect').html('<div class="infoErreur">' + result.msg +'</div>');
					};
				}//fermeture success
			});//fermeture $.ajax
		});// fermeture buttton clic
	});//fermeture document.ready
</script>



</body>

</html>
