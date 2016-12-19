<?php $this->layout('back', ['title' => 'Page de connexion']) ?>

<?php $this->start('head') ?>

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>
    <div class="containerLogin">

        <?php if (!empty($errors)): ?>
            <div class="errors">
                <?= implode('<br>',$errors) ?>
            </div>
        <?php endif; ?>


        <form class="" method="post">

            <label for="email">Email</label>
            <input id="email" type="text" name="email" value="">

            <label for="password">Mot de Passe</label>
            <input id="password" type="password" name="password" value="">
            <input type="submit" value="connexion">
        </form>
        <span>
            <a href="#">mot de passe oublié ?</a>
        </span>
        <span>
            <a href="<?= $this->url('addUser') ?>">s'enregistrer</a>
        </span>
    </div>
<?php $this->stop('main_content') ?>
