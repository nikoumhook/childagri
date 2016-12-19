<?php $this->layout('back', ['title' => 'Ajout d\'utilisateur']) ?>

<?php $this->start('head') ?>

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <?= implode('<br>',$errors) ?>
        </div>
    <?php endif; ?>

    <form class="" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input id="username" name="username" type="text">
        <label for="email">Email</label>
        <input id="email" name="email" type="email">
        <label for="password">Mot de passe</label>
        <input id="password" name="password" type="password">
        <input type="submit" value="Valider">
    </form>

<?php $this->stop('main_content') ?>
