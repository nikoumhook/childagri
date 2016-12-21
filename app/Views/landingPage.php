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
	<div id="nuage1">
		<img width="100vw" height="100vh" src="<?=$this->assetUrl('img/nuage.svg');?>">
	</div>
	<div id="nuage2">
		<img width="150vw" height="150vh" src="<?=$this->assetUrl('img/nuage.svg');?>">
	</div>
	<div id="soleil">
		<svg version="1.1" width="100vw" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="156px" height="156px" viewBox="0 0 156 156" style="enable-background:new 0 0 156 156;" xml:space="preserve"><style type="text/css">
		.st0{fill:#FEF17D;}	.st1{fill:none;stroke:#FFF27B;stroke-width:36;stroke-miterlimit:10;stroke-dasharray:11.9658,29.9146;}
		</style>
		<circle id="core" class="st0" cx="78" cy="78" r="29"/>
		<g id="rayons">
			<circle class="st1" cx="78" cy="78" r="60">
				<animateTransform id="rayonsAnim" attributeName="transform" attributeType="XML" type="rotate" from="0 78 78" to="360 78 78" dur="25s" repeatCount="indefinite"/>
			</circle>
		</g>
	</svg>
</div>

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
			<button type="button" class="overlay-close cursor">Fermer</button>

			<!-- Div wrapper formulaire Popin: 2 grid -->
			<div class="grid-2 wrapperPopin flex-container-v has-gutter">

				<!-- Div formulaire connexion Popin -->
				<div id="connexion" class="bloc1 bloc">

						<form id="FormConnect" class="bloc w100 h100" action="#">
						        <h1 class="txtcenter pam titreConnect w100"> CONNECTE TOI !</h1>
                                <div class="pas w100">Si tu es dèjà inscrit, connecte-toi ici<br>
                                    pour jouer une nouvelle partie ou finir ta partie en cours</div>

								<div class="grid-2 connect w100">
									<div class="pas">
										<input id="usernameC" class="w100 inputLanding pas" type="text" name="username" placeholder="Ton pseudo" required>
									</div>
									<div class="pas txtright">
										<input id="passwordC" class="w100 inputLanding pas" type="password" name="passwordconnect" placeholder="Ton mot de passe" required>
									</div>
								</div>
                                <!-- div Affichage resultat traitement AJAX CONNEXION-->
                                <div id="resultConnect" class="mas txtcenter flex-container-v"></div>
								<div id="buttonConnexion" class="grid pas w100">
									<button id="validConnexion" class="grid pas enregistrer cursor"type="submit">SE CONNECTER</button>
								</div>


						</form>

				</div> <!-- fermeture bloc1 -->

				<!-- Div formulaire inscription Popin -->
				<div id="inscription" class="bloc2 bloc">

						<form class="bloc" action="#">
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
									<input id="password" class="w100 inputLanding pas" type="password" name="password" placeholder="Ton mot de passe">
								</div>
								<div class="pas txtright">
									<input id="passwordVerify" class="w100 inputLanding pas" type="password" name="passwordVerify" placeholder="Ton mot de passe">
								</div>
							</div> <!-- fermeture grid2 -->

							<div class="grid-2 flex-container-v">
								<div class="txtMail pas">
									Ton adresse mail est falcutative, elle te pemet de récupérer ton mot de passe à tout moment
								</div>

								<div class="pas txtright">
									<input id="mail" class="w100 inputLanding pas" type="mail" name="mail" placeholder="Ton mail">
								</div>
							</div> <!-- fermeture grid2 -->

                            <!-- div Affichage resultat traitement AJAX INSCRIPTION-->
                            <div id="resultInscription" class="mas txtcenter flex-container-v"></div>

							<div id="buttonSubscribe" class="grid pas">
								<button id="validInscription" class="grid pas enregistrer" type="submit">S'INSCRIRE</button>
							</div>
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


<div class="script">
	<script type="text/javascript">
	$(document).ready(function() {
		nuage();
	});
	function nuage(){
		$('#nuage1').fadeIn({queue: false, duration: 2000});
		$('#nuage1').animate({left: '50%'}, 10000, 'linear')
		.animate({left:'0%'}, 10000, 'linear', function(){
			// Anim complète
			nuage();
		})
	};
	</script>
</div>

</body>

</html>
