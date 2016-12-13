<?php

	$w_routes = array(

/*//////////////ROUTE DE LA LANDINGPAGE pour affichage *///////////////////
		['GET|POST', '/', 'Landing#landingPage', 'game_landing'],
/*//////////////ROUTE Du DEBUT DE LA PARTIE *///////////////////
		['GET|POST', '/play', 'Game#startGame', 'game_startPlay'],

/*//////////////ROUTE DE LA LANDINGPAGE pour traitement ajax inscription *///////////////////
		['GET|POST', '/ajax/inscription', 'Ajax#addPlayer', 'ajax_inscription'],

/*//////////////ROUTE DE LA LANDINGPAGE pour traitement ajax connexion *///////////////////
		['GET|POST', '/ajax/connexion', 'Ajax#connectPlayer', 'ajax_connexion'],

		/*//////////////ROUTE DE LA GAME*//////////////////////////
		['GET|POST', '/game/assiette', 'Game#assiette', 'game_assiette'],
		['GET|POST', '/test/assiette', 'Assiette#assiette', 'test_assiette'],
		['GET|POST', '/game/carte', 'Game#carte', 'game_carte'],



/*//////////////BACK-OFFICE Administration*//////////////////////////

        ['GET|POST', '/config/', 'Back#home', 'back_home'],

  		 /*////////  BACK OFFICE Zone Pedago///////////////*/
         ['GET|POST', '/config/zonePedago', 'Back#zonePedago', 'back_zonePedago'],

  		/*/////// BACK OFFICE ZONE Aliments ///////////////*/
         ['GET|POST', '/config/aliment', 'Back#aliment', 'back_aliment'],


         /*/////// BACK OFFICE ZONE Quizz ///////////////*/
         ['GET|POST', '/config/quizz', 'Back#quizz', 'back_quizz'],

		/*/////// BACK OFFICE ZONE Quizz traitement ajax /////////*/
         ['GET|POST', '/ajax/quizz', 'Ajax#quizz', 'ajax_quizz'],


        /*//////////////ROUTE ANTHONY POUr TEST SON OBJET*//////////////////////////
        ['GET|POST', '/debug/[:username]/', 'Game#setPlayer', 'game_setP'],














	);
