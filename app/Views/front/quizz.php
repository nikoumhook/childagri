<?php $this->layout('front', ['title' => 'quizz']) ?>


<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/quizz.css') ?>">
<?php $this->stop('head') ?>

<?php $this->start('main_content'); ?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<legend><h1>Quiz</h1></legend><hr>
<div class="containerQuizz">
    <div id="quizzForm">
		<form class="" method="post" name="quizzform">
			<?php if(!empty($question)): ?>
			<div class="quizAliment">
				<h3><?php echo $question[0]['ingredient'] ?></h3>
				<?php foreach($question as $value): ?>
					<label for="<?=$value['id']?>"><?=$value['content']?></label>
					<input type="radio" name="<?=$value['id']?>" value="oui" checked> Oui
					<input type="radio" name="<?=$value['id']?>" value="non"> Non<br><br>
				<?php endforeach;?>
			</div>
			<?php endif; ?>
			<br>
			<button type="submit" id="button">Répondre</button>
		</form>
    </div>
</div>



<?php $this->stop('main_content') ?>
