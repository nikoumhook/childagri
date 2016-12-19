<?php $this->layout('back', ['title' => 'Liste des utilisateurs']) ?>

<!-- Colonne SQL :  id, firstname, lastname, username, password, email, inGame, id_result, id_quizz_use, birthDate -->

<?php $this->start('head') ?>

    <!-- Feuille de style LISTE BACK -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/liste.css') ?>">


<?php $this->stop('head') ?>

<?php $this->start('main_content') ?>

<table class="man">
	<tr>
		<th>Validation</th>
		<th>username</th>
		<th>email</th>
        <th>Role</th>
	</tr>
</table>
<form class="" method="post">
	<?php foreach($users as $user): ?>
        <table class="man">
            <tr>
                <td><input type="checkbox" name="users[]" value="<?= $user['id']; ?>"></td>
                <td><?= $user['username'];?></td>
                <td><?= $user['email'];?></td>
                <td><?= ($user['role'] == 'out')? 'bloqué' : 'confirmé';?></td>
            </tr>
        </table>
	<?php endforeach; ?>
    <select class="" name="action">
        <option value="validate">Confirmer</option>
        <option value="blocked">bloquer</option>
        <option value="delete">Supprimer</option>
    </select>
    <input type="submit" value="Action !!">
</form>

</table>
<?php $this->stop('main_content') ?>
