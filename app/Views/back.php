<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/knacss.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/backLayout.css') ?>">
</head>
<body>


    <nav>
        <div class="wrapper containerMenu">
            <div id="logo">
                LOGO
            </div>
            <div id="menu">
                <ul>
                    <li><a href="<= $this->url('nom_de_la_route') ?>" class="<= ($w_current_route == 'nom_de_la_route')? 'active' :''; ?>">CONFIG APP</a></li>
                    <li><a href="<= $this->url('nom_de_la_route') ?>" class="<= ($w_current_route == 'nom_de_la_route')? 'active' :''; ?>">ALIMenTS</a></li>
                    <li><a href="<= $this->url('nom_de_la_route') ?>" class="<= ($w_current_route == 'nom_de_la_route')? 'active' :''; ?>">Pedagogie</a></li>
                    <li><a href="<= $this->url('nom_de_la_route') ?>" class="<= ($w_current_route == 'nom_de_la_route')? 'active' :''; ?>">utilisateurs</a></li>
                </ul>
            </div>
        </div>
    </nav>

<!-- DEBUGGGGGGGGGGGGG       ******************************************************                  -->
    <div class="debug">
        <code>
            Anthony :
            j'ai pour habitude d'utiliser ma page d'accueil du back pour mettre les consignes et faire passer les messages entre nous et surtout les taches qu'il reste a faire
            idem j'appelle tout debug quand sa ne doit pas rester pour faire des recherche rapide sur toute les pages a la fin pour pas qu'il n'y ai des parties a ne pas mettre en ligne qui reste
            a faire :
            -> dans le dossier back faire les 4 pages de contenu avec les formulaires pour config, users,aliments,et zone pedago.
            -> dans les liens de la naviigation du back j'ai juste supprimé le ? de < ?= pour pas que sa foute la merde quand les routes existerons ont pourra le mettre en place
        </code>
    </div>

<!-- DEBUGGGGGGGGGGGGG       ******************************************************                  -->

		<main class="wrapper containerMain">
			<?= $this->section('main_content') ?>
		</main>

		<footer>
		</footer>

</body>
</html>
