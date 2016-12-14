<?php $this->layout('back', ['title' => 'Pedagogique de '.ucfirst($pedago['ingredient'])]) ?>

<?php $this->start('head') ?>

	<!-- Style Knacss -->
	<link rel="stylesheet" href="<?=$this->assetUrl('css/knacss.css');?>">
	<!-- Style -->

	<link rel="stylesheet" href="<?= $this->assetUrl('css/backPedago.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>

	<?php if (empty($pedago)) :?> 
		<div class=""> Contenu pédagogique inconnu</div>
	<?php endif;?>

	<h1 class="txtcenter"> Contenu pédagogique de <?=ucfirst($pedago['ingredient']);?> de la région <?=ucfirst($pedago['region']);?></h1>


	<div class="grid-2">

		<div class="bloc1">Texte: <?=$pedago['content'];?></div><!--  fermeture bloc 1 -->

		<div blaco="bloc2"> 
			<audio controls="controls">
  				<source src="<?=$this->assetUrl($pedago['urlSound']);?>" type="audio/mp3" />
			</audio>

			<div> Image: 
				<img src="<?=$this->assetUrl($pedago['urlImg']);?>">
			</div>
		</div> <!-- fermeture bloc 2 -->

	</div> <!-- fermeture de mon grid2 -->


<?php $this->stop('main_content') ?>