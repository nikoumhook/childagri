<?php $this->layout('quizz', ['title' => 'Accueil']) ?>

<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/quizz.css') ?>">
<?php $this->stop('head') ?>

<?php $this->start('main_content'); ?>
<legend><h1>Quiz</h1></legend><hr>
<div id="quizzForm">
		<form class="" action="index.html" method="post">
			<?php if(!empty($question1)): ?>
			<div class="quizAliment">
				<h3><?php echo $question1[0]['ingredient'] ?></h3>
				<?php foreach($question1 as $value): ?>
					<label for="<?=$value['id']?>"><?=$value['content']?></label>
					<input type="radio" name="<?=$value['id']?>" value="true" checked> Oui
					<input type="radio" name="<?=$value['id']?>" value="false"> Non<br><br>
				<?php endforeach;?>
			</div>
			<?php endif; ?>
			<?php if(!empty($question2)): ?>
			<div class="quizAliment">
				<h3><?php echo $question2[0]['ingredient'] ?></h3>
				<?php foreach($question2 as $value): ?>
					<label for="<?=$value['id']?>"><?=$value['content']?></label>
					<input type="radio" name="<?=$value['id']?>" value="true" checked> Oui
					<input type="radio" name="<?=$value['id']?>" value="false"> Non<br><br>
				<?php endforeach;?>
			</div>
			<?php endif; ?>
			<?php if(!empty($question3)): ?>
			<div class="quizAliment">
				<h3><?php echo $question3[0]['ingredient'] ?></h3>
				<?php foreach($question3 as $value): ?>
					<label for="<?=$value['id']?>"><?=$value['content']?></label>
					<input type="radio" name="<?=$value['id']?>" value="true" checked> Oui
					<input type="radio" name="<?=$value['id']?>" value="false"> Non<br>
				<?php endforeach;?>
			</div>
			<br>
			<?php endif; ?>
			<button type="submit" name="button">Répondre</button>
		</form>

</div>
<?php $this->stop('main_content') ?>
