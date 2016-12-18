<?php $this->layout('quizz', ['title' => 'Quizz']) ?>

<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/quizz.css') ?>">
<?php $this->stop('head') ?>

<?php $this->start('main_content'); ?>
<pre>
<?php
var_dump($_SESSION['results']);
?>
</pre>
<legend><h1>Quiz</h1></legend><hr>
<div id="quizzForm">
		<form class="" method="post" name="quizzform">
			<?php if(!empty($question)): ?>
			<div class="quizAliment">
				<h3><?php echo $question[0]['ingredient'] ?></h3>
				<?php foreach($question as $value): ?>
					<label for="<?=$value['id']?>"><?=$value['id']?><?=$value['content']?></label>
					<input type="radio" name="<?=$value['id']?>" value="true" checked> Oui
					<input type="radio" name="<?=$value['id']?>" value="false"> Non<br><br>
				<?php endforeach;?>
			</div>
			<?php endif; ?>
			<br>
			<button type="submit" id="button" name="button">Répondre</button>
		</form>
<?php
$_SESSION['results'][81] = 'oui';
$_SESSION['results'][82] = 'non';
$_SESSION['results'][83] = 'oui';
$_SESSION['results'][84] = 'non';
?>
</div>
<?php $this->stop('main_content') ?>
