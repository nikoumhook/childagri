<?php $this->layout('quizz', ['title' => 'Accueil']) ?>

<?php $this->start('head') ?>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/quizz.css') ?>">
<?php $this->stop('head') ?>

<?php $this->start('main_content');
var_dump($question1);
?>
<legend>Quiz</legend><hr>
<div id="quizzForm">
	<div class="quizAliment">
		<h3><pre><?php var_dump($titre); ?></pre></h3>
		<?php foreach($question1 as $value): ?>
			<label for="<?=$value['id']?>"><?=$value['content']?></label>
			<input type="radio" name="<?=$value['id']?>" value="true" checked> Oui
			<input type="radio" name="<?=$value['id']?>" value="false"> Non<br>
		<?php endforeach;?>
	</div>
	<div class="quizAliment">
		<h3>Le caca en poudre</h3>
		<?php foreach($question2 as $value): ?>
			<label for="<?=$value['id']?>"><?=$value['content']?></label>
			<input type="radio" name="<?=$value['id']?>" value="true" checked> Oui
			<input type="radio" name="<?=$value['id']?>" value="false"> Non<br>
		<?php endforeach;?>
	</div>
	<div class="quizAliment">
		<h3>La viande</h3>
		<?php foreach($question3 as $value): ?>
			<label for="<?=$value['id']?>"><?=$value['content']?></label>
			<input type="radio" name="<?=$value['id']?>" value="true" checked> Oui
			<input type="radio" name="<?=$value['id']?>" value="false"> Non<br>
		<?php endforeach;?>
	</div><br>
	<button type="submit" name="button">Répondre</button>
</div>
<?php $this->stop('main_content') ?>
