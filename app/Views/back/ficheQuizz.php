<?php $this->layout('back', ['title' => 'Quizz de '.ucfirst($aliment['name'])]) ?>

<?php $this->start('head') ?>

	<!-- Style Knacss -->
	<link rel="stylesheet" href="<?=$this->assetUrl('css/knacss.css');?>">
	<!-- Style -->

	<link rel="stylesheet" href="<?= $this->assetUrl('css/backPedago.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


	<?php if (empty($aliment)) :?> 
		<div class=""> Quizz inconnu</div>
	<?php endif;?>


<?php var_dump($aliment);?>

	<h1 class="txtcenter"> Quizz de <?=ucfirst($aliment['ingredient']);?> de la région <?=ucfirst($aliment['region']);?></h1>

	<div class="grid-2">

		<div class="bloc1">
			<div>
				<h2>QUESTION 1</h2>
					<div>Question:</div>
					<div>Réponse:</div>
			</div>



			<div>
				<h2>QUESTION 2</h2>
					<div>Question:</div>
					<div>Réponse:</div>
			</div>
		</div>


		<div class="bloc2">
			<div>
				<h2>QUESTION 3</h2>
			</div>

			<div>
				<h2>QUESTION 4</h2>
			</div>
		</div>





<?php $this->stop('main_content') ?>