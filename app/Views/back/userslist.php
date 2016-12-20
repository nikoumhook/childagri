<?php $this->layout('back', ['title' => 'Liste des utilisateurs']) ?>

<!-- Colonne SQL :  id, firstname, lastname, username, password, email, inGame, id_result, id_quizz_use, birthDate -->

<?php $this->start('head') ?>

    <!-- Feuille de style LISTE BACK -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/liste.css') ?>">


<?php $this->stop('head') ?>

<?php $this->start('main_content') ?>


<h1 class="titreForm txtcenter pam">Liste des utilisateurs</h1>

<table class="man">
	<tr>
		<th class="thUserList txtcenter">SELECTIONNER</th>
		<th class="thUserList txtcenter">PSEUDO</th>
		<th class="thUserList txtcenter">MAIL</th>
        <th class="thUserList txtcenter">ROLE</th>
	</tr>
</table>
<form class="" method="post">
	<?php foreach($users as $user): ?>
        <table class="man">
            <tr>
                <td class="txtcenter"><input class="" type="checkbox" name="users[]" value="<?= $user['id']; ?>"></td>
                <td><?= ucfirst($user['username']);?></td>
                <td><?= $user['email'];?></td>
                <td class="txtcenter"><?= ($user['role'] == 'out')? 'Bloqué' : 'Confirmé';?></td>
            </tr>
        </table>
	<?php endforeach; ?>

    <div class="grid-5 flex-container-v align mam">
        <div class="push txtright">
            <select class="selectUserList pas mas" name="action">
                <option value="validate">Confirmer</option>
                <option value="blocked">Bloquer</option>
                <option value="delete">Supprimer</option>
            </select>
        </div>
        <div class="pull">
            <button type="submit" class="bouttonUserList pas mas">ENREGISTRER</button>
        </div>
    </div>


</form>

</table>
<?php $this->stop('main_content') ?>
