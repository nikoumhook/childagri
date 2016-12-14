<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/knacss.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/backLayout.css') ?>">

    <?= $this->section('head') ?>

</head>
<body>


    <nav>
        <div class="wrapper containerMenu">
            <div id="logo">
                <a href="<= $this->url('back_home') ?>">LOGO</a>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="<= $this->url('nom_de_la_route') ?>" class="<= ($w_current_route == 'nom_de_la_route')? 'active' :''; ?>">CONFIG APP</a></li>

                    <li><a href="<?= $this->url('back_aliment') ?>" class="<= ($w_current_route == 'back_aliment')? 'active' :''; ?>">ALIMenTS</a></li>

                    <li><a href="<?= $this->url('back_zonePedago') ?>" class="<= ($w_current_route == 'back_zonePedago')? 'active' :''; ?>">Pedagogie</a></li>

                    <li><a href="<?= $this->url('back_quizz') ?>" class="<= ($w_current_route == 'back_quizz')? 'active' :''; ?>">Quizz</a></li>

                    <li><a href="<= $this->url('nom_de_la_route') ?>" class="<= ($w_current_route == 'nom_de_la_route')? 'active' :''; ?>">utilisateurs</a></li>
                </ul>
            </div>
        </div>
    </nav>


		<main class="wrapper containerMain">
			<?= $this->section('main_content') ?>
		</main>

		<footer>
		</footer>

</body>
</html>
