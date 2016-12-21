<?php $this->layout('front', ['title' => 'quizz']) ?>


<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/quizz.css') ?>">
<?php $this->stop('head') ?>

<?php $this->start('main_content'); ?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>


    <div id="navTopBar">
        <div class="pas flex-container-v displayNoneSmall">
            <div class="center-wrap">
              <div class="title-container">
                <div class="ribbon-left"></div>
                <div class="backflag-left"></div>
                <div class="title"><?= strtoupper($_SESSION['player']['username']);?> JOUE AU QUIZZ AVEC NOUS !
                 <span class="sous-title">
                     Réponds à chacunes des questions l'une après l' autre
                 </span>
                </div>
                <div class="backflag-right"></div>
                <div class="ribbon-right"></div>
              </div>
            </div>
            <!-- le contenu ici est remplacé par jQuery quand un repas est selectionné ! -->
            <!-- <div class="reglesAssiettes1 pas txtcenter">
                <= strtoupper($_SESSION['player']['username']);?> A TOI DE JOUER POUR DECOUVRIR LES ALIMENTS QUE TU MANGES AU QUOTIDIEN
            </div>
            <div class="reglesAssiettes2 pas txtcenter">
                Cliques sur un repas et des aliments vont apparaitre <br>
                Choisis 3 aliments que tu souhaites manger et glisse-les dans ton assiette
            </div> -->
        </div>
    </div>

	<div class="pal containerQuizz">
	    <div id="quizzForm">

			<form class="mal" method="post" name="quizzform">

				<?php if(!empty($question)): ?>

				<div class="quizzAliment">

					<h1 class="txtcenter"><?= ucfirst($question[0]['ingredient']) ?></h1>

                    <?php $i=1; ?>
					<?php foreach($question as $value): ?>
						<label class="txtcenter" for="<?=$value['id']?>"><?=$value['content']?></label>

						<div class="grid-6 flex-container-v">

							<div class="push">
                                <label class="inputRadioQuizz" for="OUI<?= $i; ?>">OUI </label>
								<input id="OUI<?= $i; ?>" type="radio" name="<?=$value['id']?>" value="oui" checked>
							</div>
							<div class="pull">
								<input id="NON<?= $i; ?>" type="radio" name="<?=$value['id']?>" value="non"><label class="inputRadioQuizz" for="NON<?= $i; ?>"> NON</label>
							</div>
						</div>
                        <?php $i++; ?>
					<?php endforeach;?>

						<div class="grid txtcenter mam">
							<button type="submit" id="button" class="cursor bouttonEnregistrerQuizz">REPONDRE</button>
						</div>
				</div>


				<?php endif; ?>




			</form>
	    </div>
	</div>



<?php $this->stop('main_content') ?>
