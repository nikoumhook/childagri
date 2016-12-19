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


	<!-- DIV grand wrapper -->
	<div id="wrapper" class="backgroundLanding">

		<!-- Div explication -->
		<!-- <div id="explainLanding">
			<h1 class="txtcenter titreLanding">Amuse toi à découvrir ce que tu manges tous les jours !</h1>
		</div> -->
        <div class="containerBtn wrapper">
            <!-- Button play -->
            <button id="trigger-overlay" type="button" class="overlay playBtn">ON JOUE</button>
        </div>


		<!-- Div POPIN -->
        <div id="log" class="overlay overlay-simplegenie centreurOverlay">

			<!-- Bouton fermeture de la div simple genius-->
			<button type="button" class="overlay-close">Fermer</button>

			<!-- Div wrapper formulaire Popin: 2 grid -->
			<div class="grid-2 wrapperPopin flex-container-v has-gutter">

				<!-- Div formulaire connexion Popin -->
				<div id="connexion" class="bloc1 flex-container-v">

					<div class="flex-container-v">
						<form id="FormConnect" class="" action="#">
						<h1 class="txtcenter pam titreConnect"> CONNECTE TOI !</h1>

							<div class="flex-container-v flex-container">
								<div class="grid-2 connect flex-container-v">
									<div class="pas">
										<input id="usernameC" class="inputConnect inputLanding pas" type="text" name="username" placeholder="Ton pseudo" required>
									</div>
									<div class="pas txtright">
										<input id="passwordC" class="inputConnect inputLanding pas" type="password" name="passwordconnect" placeholder="Ton mot de passe" required>
									</div>
								</div>
								<div id="buttonConnexion" class="grid pas">
									<button id="validConnexion" class="grid pas enregistrer"type="submit">SE CONNECTER</button>
								</div>
							</div>

							<!-- div Affichage resultat traitement AJAX CONNEXION-->
							<div id="resultConnect" class="mal txtcenter flex-container-v"></div>

						</form>
					</div>

				</div> <!-- fermeture bloc1 -->

				<!-- Div formulaire inscription Popin -->
				<div id="inscription" class="bloc2 flex-container-v">

					<div class="flex-container-v">
						<form class="" action="#">
						<h1 class="txtcenter pam titreConnect"> INSCRIS TOI !</h1>
							
							<div class="grid-3 flex-container-v">
								<div class="pas">
									<input id="firstname" class="inputLanding pas" type="text" name="firstname" placeholder="Ton prénom">
								</div>
								<div class="pas">
									<input id="lastname" class="inputLanding pas" type="text" name="lastname" placeholder="Ton nom" >
								</div>
								<div class="pas">
									<input id="username" class="inputLanding pas" type="text" name="username" placeholder="Ton pseudo">
								</div>
							</div> <!-- fermeture grid3 -->

							<div class="grid-2 flex-container-v">
								<div class="pas">
									<input id="password" class="inputPassword inputLanding pas" type="password" name="password" placeholder="Ton mot de passe">
								</div>
								<div class="pas txtright">
									<input id="passwordVerify" class="inputPassword inputLanding pas" type="password" name="passwordVerify" placeholder="Ton mot de passe">
								</div>
							</div> <!-- fermeture grid2 -->

							<div class="grid-2 flex-container-v">
								<div class="txtMail pas">
									Ton adresse mail est falcutative, elle te pemet de récupérer ton mot de passe à tout moment
								</div>

								<div class="pas txtright">
									<input id="mail" class="inputLanding pas" type="mail" name="mail" placeholder="Ton mail">
								</div>
							</div> <!-- fermeture grid2 -->

							<div id="buttonSubscribe" class="grid pas">
								<button id="validInscription" class="grid pas enregistrer" type="submit">S'INSCRIRE</button>
							</div>

							<!-- div Affichage resultat traitement AJAX INSCRIPTION-->
							<div id="resultInscription" class="mam txtcenter flex-container-v"></div>

							</form>
					</div>

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
						$('#resultInscription').html('<div class="pas infoReussite">' + result.msg +'</div>');

                        setInterval(function(){
                            $(location).attr('href','<?= $this->url('game_startPlay'); ?>');
                        },3000);
					}
					else if(result.code =='error'){
						$('#resultInscription').html('<div class="pas txtcenter infoErreur">' + result.msg +'</div>');
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
						$('#resultConnect').html('<div class="pas txtcenter infoErreur">' + result.msg +'</div>');
					};
				}//fermeture success
			});//fermeture $.ajax
		});// fermeture buttton clic
	});//fermeture document.ready
</script>



</body>

</html>
