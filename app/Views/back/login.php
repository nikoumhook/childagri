<?php $this->layout('back', ['title' => 'Page de connexion']) ?>

<?php $this->start('head') ?>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/formulaire.css') ?>">
<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>
    <div class="containerLogin pal">

        <?php if (!empty($errors)): ?>
            <div class="erreur pll">
                <?= implode('<br>',$errors) ?>
            </div>
        <?php endif; ?>

        <h1 class="titreForm txtcenter pas">Connexion</h1>

        <form class="loginForm w70 center pas" method="post">

            <label class="w60 labelAddUser" for="email">Email</label>
            <input class="w60 inputAddUser pam" id="email" type="text" name="email" value="">

            <label class="w60 labelAddUser" for="password">Mot de Passe</label>
            <input class="w60 inputAddUser pam" id="password" type="password" name="password" value="">
            <input class="w60 bouttonEnregistrerUser cursor mtl" type="submit" value="connexion">
            <div class="w60 center mtm">
                <span>
                    <a href="#">mot de passe oublié ?</a>
                </span>
                <span>
                    <a href="<?= $this->url('addUser') ?>">s'enregistrer</a>
                </span>
            </div>
        </form>
    </div>
<?php $this->stop('main_content') ?>
