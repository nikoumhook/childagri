<?php $this->layout('back', ['title' => 'Liste des utilisateurs']) ?>

<!-- Colonne SQL :  id, firstname, lastname, username, password, email, inGame, id_result, id_quizz_use, birthDate -->

<?php $this->start('main_content') ?>

<table>
	<tr>
		<th>username</th>
		<th>birthDate</th>
		<th>email</th>
	</tr>
	<?php foreach($players as $player): ?>
		<tr>
			<td><?php echo $player['username'];?></td>
			<td><?php echo $player['birthDate'];?></td>
			<td><?php echo $player['email'];?></td>
		</tr>
	<?php endforeach; ?>

</table>
<?php $this->stop('main_content') ?>