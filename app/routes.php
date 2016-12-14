<?php

	$w_routes = array(

/*//////////////ROUTE DE LA LANDINGPAGE pour affichage *///////////////////
		['GET|POST', '/', 'Landing#landingPage', 'game_landing'],


/*//////////////ROUTE DE LA GAME*//////////////////////////
        // Connection du joueur DEBUT DE LA PARTIE :
        ['GET|POST', '/play', 'Game#startGame', 'game_startPlay'],
        // Page assiette :
		['GET|POST', '/game/assiette', 'Assiette#assiette', 'game_assiette'],
        // Page carte :
		['GET|POST', '/game/carte', 'Carte#carte', 'game_carte'],


        // menu deco (quit) et reset :
        ['GET', '/game/reset/', 'Game#resetGame', 'game_reset'],
        ['GET', '/game/quit/', 'Game#quitGame', 'game_quit'],


/*///////////////////////////////// TRAITEMENT AJAX *///////////////////
        // LANDINGPAGE inscription :
        ['GET|POST', '/ajax/inscription', 'Ajax#addPlayer', 'ajax_inscription'],
        // LANDINGPAGE connexion :
        ['GET|POST', '/ajax/connexion', 'Ajax#connectPlayer', 'ajax_connexion'],
        // BACK traitement des quizz :
        ['GET|POST', '/ajax/quizz', 'Ajax#quizz', 'ajax_quizz'],
        // BACK traitement des quizz :
        ['GET|POST', '/ajax/finassiette', 'Ajax#finAssiette', 'ajax_finAssiette'],


/*//////////////BACK-OFFICE Administration*//////////////////////////

        // BACK page d'accueil :
        ['GET|POST', '/config/', 'Back#home', 'back_home'],

        // BACK zone pedago :
         ['GET|POST', '/config/zonePedago', 'Back#zonePedago', 'back_zonePedago'],

        // BACK Liste pedago :
         ['GET|POST', '/config/listePedago', 'Back#listePedago', 'back_listePedago'],

        // BACK Fiche pedago :
         ['GET|POST', '/config/fichePedago/[i:id]', 'Back#fichePedago', 'back_fichePedago'],

         // BACK Aliments :/
         ['GET|POST', '/config/aliment', 'Back#aliment', 'back_aliment'],

          // BACK Liste Aliments :/
         ['GET|POST', '/config/listeAliment', 'Back#listeAliment', 'back_listeAliment'],


         // BACK Affichage Quizz (traitement fait en ajax) :
         ['GET|POST', '/config/quizz', 'Back#quizz', 'back_quizz'],

        // BACK Liste Quizz :/
         ['GET|POST', '/config/listeQuizz', 'Back#listeQuizz', 'back_listeQuizz'],

        // BACK Fiche Quizz :/
         ['GET|POST', '/config/ficheQuizz/[i:id]', 'Back#ficheQuizz', 'back_ficheQuizz'],


	);
