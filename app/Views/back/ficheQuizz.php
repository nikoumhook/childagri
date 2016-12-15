<?php $this->layout('back', ['title' => 'Quizz de '.ucfirst($quizz1['name'])]) ?>

<?php $this->start('head') ?>

	

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


	<?php if (empty($quizz1)) :?>
		<div class=""> Pas encore de quizz</div>
    <?php else: ?>


     <!-- affichage des messages d'erreur -->
    <?php if (isset($errors) && !empty($errors)):?>
        <div class=""><?=implode('<br>', $errors);?></div>
     <?php endif;?>

    <?php if (isset($success) && $success == true):?>
        <div class="">Bravo votre quizz a bien été mis à jour</div>
     <?php endif;?>


    <form method="POST">

        <h1 class="txtcenter"> Quizz de: <br> <?=ucfirst($quizz1['ingredient']);?> de la région <?=ucfirst($quizz1['region']);?></h1>

        <div class="grid-2">

            <div class="bloc1">

                <?php if (isset($quizz1) && !empty($quizz1)): ?>
              
                    <div>
                        <h2>QUESTION 1</h2>

                        <input type="hidden" value="<?= $quizz1['id'];?>" name="id1">

                        <label for="question1"> Question:</label>
                        <br>
                        <textarea id="question1" class="" name="question1"><?=ucfirst($quizz1['content']);?></textarea>
                        <br>

                        <label for="answer1"> Réponse:</label>
                        <br>
                        <input type="radio" name=" answer1" value="oui" <?=($quizz1['answer']=='oui')? 'checked': '';?>> OUI<br>
                        <input type="radio" name="answer1" value="non" <?=($quizz1['answer']=='non')? 'checked': '';?>> NON<br>

                        <label for="answer1explain"> Réponse:</label>
                        <br>
                        <textarea id="answer1explain" name="explainAnswer1" class=""><?=($quizz1['explainAnswer']);?></textarea>
                    </div>

                <?php endif; ?>

                <?php if (isset($quizz2) && !empty($quizz2)): ?>

                        <h2>QUESTION 2</h2>

                        <input type="hidden" value="<?= $quizz2['id'];?>" name="id2">

                        <label for="question2"> Question:</label>
                        <br>
                        <textarea id="question2" class="" name="question2"><?=ucfirst($quizz2['content']);?></textarea>
                        <br>

                        <label for="answer2"> Réponse:</label>
                        <br>
                        <input type="radio" name="answer2" value="oui" <?=($quizz2['answer']=='oui')? 'checked': '';?>> OUI<br>
                        <input type="radio" name="answer2" value="non" <?=($quizz2['answer']=='non')? 'checked': '';?>> NON<br>

                        <label for="answer2explain"> Réponse:</label>
                        <br>
                        <textarea id="answer2explain" name="explainAnswer2" class=""><?=($quizz2['explainAnswer']);?></textarea>

                <?php endif; ?>
            </div> <!-- fermeture bloc 1 -->


            <div class="bloc2">
                <?php if (isset($quizz3) && !empty($quizz3)): ?>

                        <h2>QUESTION 3</h2>

                        <input type="hidden" value="<?= $quizz3['id'];?>" name="id3">

                        <label for="question3"> Question:</label>
                        <br>
                        <textarea id="question3" class="" name="question3"><?=ucfirst($quizz3['content']);?></textarea>
                        <br>

                        <label for="answer3"> Réponse:</label>
                        <br>
                        <input type="radio" name="answer3" value="oui" <?=($quizz3['answer']=='oui')? 'checked': '';?>> OUI<br>
                        <input type="radio" name="answer3" value="non" <?=($quizz3['answer']=='non')? 'checked': '';?>> NON<br>

                        <label for="answer3explain"> Réponse:</label>
                        <br>
                        <textarea id="answer3explain" name="explainAnswer3" class=""><?=($quizz3['explainAnswer']);?></textarea>

                <?php endif; ?>

                <?php if (isset($quizz4) && !empty($quizz4)): ?>


                        <h2>QUESTION 4</h2>

                        <input type="hidden" value="<?= $quizz4['id'];?>" name="id4">

                        <label for="question4"> Question:</label>

                        <br>
                        <textarea id="question4" class="" name="question4"><?=ucfirst($quizz4['content']);?></textarea>
                        <br>

                        <label for="answer4"> Réponse:</label>
                        <br>
                        <input type="radio" name="answer4" value="oui" <?=($quizz4['answer']=='oui')? 'checked': '';?>> OUI<br>
                        <input type="radio" name="answer4" value="non" <?=($quizz4['answer']=='non')? 'checked': '';?>> NON<br>

                        <label for="answer4explain"> Réponse:</label>
                        <br>
                        <textarea id="answer4explain" name="explainAnswer4" class=""><?=($quizz4['explainAnswer']);?></textarea>

                <?php endif; ?>

            </div> <!-- fermeture bloc 2 -->

             <!-- Bouton -->
            <div class="center">
                <button type="submit" class="">ENREGISTRER LES MODIFICATIONS</button>
            </div>

    </form>

	<?php endif;?>





<?php $this->stop('main_content') ?>
