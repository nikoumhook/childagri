<?php $this->layout('back', ['title' => 'Quizz de '.ucfirst($quizz1['name'])]) ?>

<?php $this->start('head') ?>

	<!-- Style Knacss -->
	<link rel="stylesheet" href="<?=$this->assetUrl('css/knacss.css');?>">
	<!-- Style -->

	<link rel="stylesheet" href="<?= $this->assetUrl('css/backPedago.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


	<?php if (empty($quizz1)) :?>
		<div class=""> Pas encore de quizz</div>
    <?php else: ?>

        <h1 class="txtcenter"> Quizz de <?=ucfirst($quizz1['ingredient']);?> de la région <?=ucfirst($quizz1['region']);?></h1>

        <div class="grid-2">

            <div class="bloc1">
                <?php if (isset($quizz1) && !empty($quizz1)): ?>
                    <div>
                        <h2>QUESTION 1</h2>
                        <div>Question: <?=ucfirst($quizz1['content']);?></div>
                        <div>Réponse: <?=($quizz1['answer']);?></div>
                        <div>Elements de réponse: <?=($quizz1['explainAnswer']);?></div>

                    </div>
                <?php endif; ?>

                <?php if (isset($quizz2) && !empty($quizz2)): ?>
                    <div>
                        <h2>QUESTION 2</h2>
                        <div>Question: <?=ucfirst($quizz2['content']);?></div>
                        <div>Réponse: <?=($quizz2['answer']);?></div>
                        <div>Elements de réponse: <?=($quizz2['explainAnswer']);?></div>

                    </div>
                <?php endif; ?>
            </div>
            <div class="bloc2">
                <?php if (isset($quizz3) && !empty($quizz3)): ?>
                    <div>
                        <h2>QUESTION 3</h2>
                        <div>Question: <?=ucfirst($quizz3['content']);?></div>
                        <div>Réponse: <?=($quizz3['answer']);?></div>
                        <div>Elements de réponse: <?=($quizz3['explainAnswer']);?></div>

                    </div>
                <?php endif; ?>
                <?php if (isset($quizz4) && !empty($quizz4)): ?>
                    <div>
                        <h2>QUESTION 4</h2>
                        <div>Question: <?=ucfirst($quizz4['content']);?></div>
                        <div>Réponse: <?=($quizz4['answer']);?></div>
                        <div>Elements de réponse: <?=($quizz4['explainAnswer']);?></div>

                    </div>
                <?php endif; ?>
            </div>

	<?php endif;?>




<?php $this->stop('main_content') ?>
