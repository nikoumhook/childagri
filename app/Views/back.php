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

    <nav class="mtm mbm">
        <div class="wrapper containerMenu">
            <div id="logo">
                <a href="<?= $this->url('back_home') ?>">LOGO</a>
            </div>
            <?php if(!empty($w_user)):?>
                <div id="menu">
                <ul>
                    <li>
                        <span class="menuItem" >
                            <a href="<?= $this->url('back_aliment') ?>" class="<?= ($w_current_route == 'back_aliment')? 'active' :''; ?>">ALIMENTS</a>
                        </span>
                        <ul class="subMenu" >
                            <li class="mts"><a href="<?= $this->url('back_aliment') ?>">Creation d'aliment</a></li>
                            <li class="mts"><a href="<?= $this->url('back_listeAliment') ?>">Liste Aliments</a></li>
                        </ul>
                    </li>

                    <li>
                        <span class="menuItem">
                            <a href="<?= $this->url('back_zonePedago') ?>" class="<?= ($w_current_route == 'back_zonePedago')? 'active' :''; ?>">PEDAGOGIE</a>
                        </span>
                        <ul class="subMenu" >
                            <li class="mts"><a href="<?= $this->url('back_zonePedago') ?>">Creation Pedago</a></li>
                            <li class="mts"><a href="<?= $this->url('back_listePedago') ?>">Liste Pedago</a></li>
                        </ul>
                    </li>

                    <li>
                        <span class="menuItem">
                            <a href="<?= $this->url('back_quizz') ?>" class="<?= ($w_current_route == 'back_quizz')? 'active' :''; ?>">QUIZZ</a>
                        </span>
                        <ul class="subMenu" >
                            <li class="mts"><a href="<?= $this->url('back_quizz') ?>">Creation Quizz</a></li>
                            <li class="mts"><a href="<?= $this->url('back_listeQuizz') ?>">Liste Quizz</a></li>
                        </ul>
                    </li>

                    <li class="" ><a href="<?= $this->url('back_listeUser') ?>" class="<?= ($w_current_route == 'back_listeUser')? 'active' :''; ?>">JOUEURS</a>
                    </li>
                </ul>


            </div>

            <?php endif; ?>
        </div>
    </nav>

    <div class="centreur">
		<main class="wrapper mam">
			<?= $this->section('main_content') ?>
		</main>
    </div>

		<footer>
            <div class="containerFooter">
                <?php if(!empty($w_user)):?>
                    <a href="<?= $this->url('deconnexion') ?>">Deconnexion</a>

                    <a href="<?= $this->url('userlist') ?>">Gestion des utilisateurs</a>
                    <a href="<?= $this->url('addUser') ?>">Ajout d'utilisateur</a>
                <?php endif; ?>
                <a href="<?= $this->url('login') ?>">A propos</a>
            </div>
		</footer>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script>
            $(function(){
                var p;
                $('.menuItem').click(function(e){
                    e.preventDefault();

                    p = $(this).next();
                    //p= p[1];

                    $('.down').slideUp();

                    if ($(p).hasClass('down')) {
                        $('.down').slideUp();
                        $(p).removeClass('down');

                    }else {
                        $('.down').removeClass('down');
                        $(p).addClass('down')
                        $(p).slideDown();
                    }
                    //console.log($(p).css('display'));

                });

                $( "main" ).mouseover(function(){
                    $('.down').slideUp();
                    $(p).removeClass('down');
                });
            });
        </script>
        <?= $this->section('js') ?>
</body>
</html>
