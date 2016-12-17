<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>


    <!-- Typo -->
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!--Icone FontAwesome CDN Bootstrape-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    <!-- Feuille de style knacss -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/knacss.css') ?>">

    <!-- Feuille de style de tous les back -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/backLayout.css') ?>">

    <?= $this->section('head') ?>

</head>
<body>

    <nav>
        <div class="wrapper containerMenu">
            <div id="logo">
                <a href="<?= $this->url('back_home') ?>">LOGO</a>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="<?= $this->url('back_aliment') ?>" class="<= ($w_current_route == 'back_aliment')? 'active' :''; ?>">ALIMENTS</a></li>

                    <li><a href="<?= $this->url('back_zonePedago') ?>" class="<= ($w_current_route == 'back_zonePedago')? 'active' :''; ?>">PEDAGOGIE</a></li>

                    <li><a href="<?= $this->url('back_quizz') ?>" class="<= ($w_current_route == 'back_quizz')? 'active' :''; ?>">QUIZZ</a></li>

                    <li><a href="<= $this->url('nom_de_la_route') ?>" class="<= ($w_current_route == 'nom_de_la_route')? 'active' :''; ?>">JOUEURS</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="centreur">
		<main class="wrapper mam">
			<?= $this->section('main_content') ?>
		</main>
    </div>

		<footer>
		</footer>

</body>
</html>
