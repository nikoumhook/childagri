<?php $this->layout('back', ['title' => 'Ajout d\'utilisateur']) ?>

<?php $this->start('head') ?>

    <!-- Feuille de style FORMULAIRE BACK -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/formulaire.css') ?>">


<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


    <h1 class="titreForm txtcenter pam">Ajouter un utilisateur</h1>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <?= implode('<br>',$errors) ?>
        </div>
    <?php endif; ?>

    <form class="" method="post">
        <div class="grid-6 flex-container-v">
            <div class="blocUser pas push txtcenter">
                <label for="username" class="labelAddUser">PSEUDO</label>
                <input id="username" class="inputAddUser" name="username" type="text">
            </div>
            <div class="blocUser pas txtcenter"> 
                <label for="email" class="labelAddUser">MAIL</label>
                <input id="email" class="inputAddUser" name="email" type="email">
            </div>
            <div class="blocUser pas pull txtcenter">
                <label for="password" class="labelAddUser">MOT DE PASSE</label>
                <input id="password" class="inputAddUser" name="password" type="password">
            </div>
        </div>
        <div class="mas txtcenter">
             <button type="submit" class="bouttonEnregistrerUser">ENREGISTRER</button>
         </div>

    </form>

<?php $this->stop('main_content') ?>
