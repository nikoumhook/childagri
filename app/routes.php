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
        // Page quizz :
        ['GET|POST', '/game/quizz', 'Quizz#quizz', 'game_quizz'],
        ['GET|POST', '/game/ajax/quizz', 'Quizz#updateQuizz', 'game_updateQuizz'],
        // Page result :
        ['GET|POST', '/game/result', 'Result#result', 'game_result'],
        // Page result :
        ['GET|POST', '/game/resultat/[i:id]', 'Result#recupresult', 'game_recup_result'],


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
        // BACK delete Aliments :/
        ['GET|POST', '/ajax/deletealiment', 'Ajax#deleteAliment', 'ajax_deleteAliment'],
        // ASSIETTE récuperation des aliments en fonction du repas :
        ['GET|POST', '/ajax/getaliments', 'Ajax#getNeedIngredientsForRepas', 'ajax_getAliments'],
        // Carte récuperation des aliments en fonction du repas :
        ['GET|POST', '/ajax/fincarte', 'Ajax#finCarte', 'ajax_finCarte'],
        // Enregistrement du resultat :
        ['GET|POST', '/ajax/saveresultat', 'Ajax#saveResultatQuizz', 'ajax_saveresultat'],
        // Recupétation et affichage des resultats :
        ['GET|POST', '/ajax/recupresultat', 'Ajax#recupResultat', 'ajax_recupresultat'],


/*//////////////BACK-OFFICE Administration*//////////////////////////

        // BACK-CONNEXION page de login :
        ['GET|POST', '/config/login/', 'Users#login', 'login'],
        ['GET|POST', '/config/adduser/', 'Users#addUser', 'addUser'],
        ['GET|POST', '/config/logout/', 'Users#logout', 'deconnexion'],
        ['GET|POST', '/config/userlist/', 'Users#ListUsers', 'userlist'],

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

        // BACK  Fiche Aliments :/
         ['GET|POST', '/config/ficheAliment/[i:id]', 'Back#ficheAliment', 'back_ficheAliment'],

         // BACK Affichage Quizz (traitement fait en ajax) :
         ['GET|POST', '/config/quizz', 'Back#quizz', 'back_quizz'],

        // BACK Liste Quizz :/
         ['GET|POST', '/config/listeQuizz', 'Back#listeQuizz', 'back_listeQuizz'],

        // BACK Fiche Quizz :/
         ['GET|POST', '/config/ficheQuizz/[i:id]', 'Back#ficheQuizz', 'back_ficheQuizz'],

         // BACK Fiche Utilisateurs :/
         ['GET|POST', '/config/listeUser', 'BackUsers#listeUser', 'back_listeUser']


	);
