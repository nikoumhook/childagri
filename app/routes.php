<?php

	$w_routes = array(

/*//////////////ROUTE DE LA LANDINGPAGE pour affichage *///////////////////
		['GET|POST', '/', 'Landing#landingPage', 'game_landing'],

/*//////////////ROUTE DE LA LANDINGPAGE pour traitement ajax inscription *///////////////////
		['GET|POST', '/ajax/inscription', 'Ajax#addPlayer', 'ajax_inscription'],

/*//////////////ROUTE DE LA LANDINGPAGE pour traitement ajax connexion *///////////////////
		['GET|POST', '/ajax/connexion', 'Ajax#connectPlayer', 'ajax_connexion'],

		/*//////////////ROUTE DE LA GAME*//////////////////////////
		['GET|POST', '/game/assiette', 'Game#assiette', 'game_assiette'],
		['GET|POST', '/game/carte', 'Game#carte', 'game_carte']
	);
