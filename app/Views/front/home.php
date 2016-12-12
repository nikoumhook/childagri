<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('head') ?>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/simpleGenie.css') ?>">
    <script src="<?= $this->assetUrl('js/modernizr.custom.js') ?>"></script>

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>
	<h2>Let's play</h2>

    <button id="trigger-overlay" type="button">PLAY</button>
<?php $this->stop('main_content') ?>

<?php $this->start('script_content') ?>
<div class="overlay overlay-simplegenie">

    <button type="button" class="overlay-close">Fermer</button>
    <div class="grid-2">
        <!-- formulaire pour les personnes ayant deja un compte -->
        <div id="login">
            <h2>Connection</h2>
            <form class="login" action="#" method="post">
                <label for="username">Pseudo</label>
                <input id="username" name="username" class="" type="text" required>
                <label for="password">Mot de passe</label>
                <input id="password" name="password" class="" type="password" required>
                <button type="submit">Connecter</button>
            </form>
        </div>
        
        <!-- formulaire pour les personnes ne possedant pas de compte -->
        <div id="subscribe">
            <h2>Inscription</h2>
            <form class="subscribe" action="#" method="post">
                <label for="username">Pseudo</label>
                <input id="username" name="username" class="" type="text">
                <label for="email">Email (je le met mais il n'est pas obligatoire)</label>
                <input id="email" name="email" class="" type="email">
                <label for="password">Mot de passe</label>
                <input id="password" name="password" class="" type="password">
                <label for="password">Répéter votre mot de passe</label>
                <input id="password" name="password" class="" type="password">
                <span>mettre un cpatcha, quasi obligatoire vu qu'on demande pas de mail n'y rien sa veut dire qu'on peut se faire attaquer par les robots facilement</span>
                <div class="">
                    L'adresse email ,n'est pas obligatoire mais si tu n'en indique pas memorise bien ton mot de passe.
                </div>
                <button type="submit">Connecter</button>
            </form>
        </div>
    </div>

</div>

<script src="<?= $this->assetUrl('js/classie.js') ?>"></script>
<script src="<?= $this->assetUrl('js/demo1.js') ?>"></script>

</script>

<?php $this->stop('script_content') ?>
