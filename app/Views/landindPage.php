<!DOCTYPE html>
<html lang="fr">


<head>
	<title>Page accueil</title>


</head>


<body>

</body>

	<!-- DIV grand wrapper --> 
	<div id="wrapper" class="backgroundLanding">

		<!-- Div explication -->
		<div id="explainLanding"> Joue et découvre ce que tu manges tous les jours !</div>

		<!-- Button play -->
		<button type="submit" class="overlay">ON JOUE</button>


		<!-- Div POPIN -->
		<div class="overlay">

			<!-- Div wrapper formulaire Popin: 2 grid -->
			<div class="grid-2">

				<!-- Div formulaire connexion Popin -->
				<div>
					<form>
						<!-- div Affichage resultat traitement AJAX CONNEXION-->
						<div id="resultConnect"></div> 

						<!-- formulaire connexion-->
						<label for="pseudo">Ton pseudo</label>
						<input id="pseudo" type="text" name="pseudo" placeholder="Maxou33">


						<label for="password">Ton mot de passe</label>
						<input id="password" type="password" name="passwordVerify" placeholder="UnMot2PassSecret33">

						<button type="submit">SE CONNECTER POUR JOUER</button>
						
					</form>
				</div>

				<!-- Div formulaire inscription Popin -->
				<div>
					<form>
						<!-- div Affichage resultat traitement AJAX INSCRIPTION-->
						<div id="resultInscription"></div> 

						<!-- formulaire iscription-->
						<label for="firstname">Ton prénom</label>
						<input id="firstname" type="text" name="firstname" placeholder="Ex: Maxime">

						<label for="lastname">Ton mom</label>
						<input id="lastname" type="text" name="lastname" placeholder="Segol" >

						<label for="pseudo">Ton pseudo</label>
						<input id="pseudo" type="text" name="pseudo" placeholder="Maxou33">

						<label for="password">Ton mot de passe</label>
						<input id="password" type="password" name="password" placeholder="UnMot2PassSecret33">

						<label for="passwordVerify">Ton mot de passe pour le vérifier</label>
						<input id="passwordVerify" type="password" name="passwordVerify" placeholder="UnMot2PassSecret33">

						<label for="mail">Ton mail</label>
						<input id="mail" type="mail" name="email" placeholder="maxS@gmail.com">

						<button type="submit">S'INSCIRE POUR JOUER</button>
						
					</form>
				</div>
			</div>
		</div>



		
	</div>


</html>
