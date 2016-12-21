<?php $this->layout('back', ['title' => 'Quizz de '.ucfirst($quizz1['name'])]) ?>

<?php $this->start('head') ?>

	<!-- Feuille de style FICHE BACK -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/fiche.css') ?>">

<?php $this->stop('head') ?>


<?php $this->start('main_content') ?>


	<?php if (empty($quizz1)) :?>
		<div class=" txt-center pas noQuizz"> Cet aliment n'a pas encore de quizz. <a href="<?= $this->url('back_quizz') ?>">Créez lui son quizz</a>
        </div>
    <?php else: ?>


     <!-- affichage des messages d'erreur -->
    <?php if (isset($errors) && !empty($errors)):?>
        <div class="pas erreur"><?=implode('<br>', $errors);?></div>
     <?php endif;?>

    <?php if (isset($success) && $success == true):?>
        <div class="pas success">Bravo votre quizz a bien été mis à jour</div>
     <?php endif;?>


    <form method="POST">

        <h1 class="titreFiche txtcenter pam"> Quizz du <?=strtolower($quizz1['ingredient']);?> de la région <?=ucfirst($quizz1['region']);?></h1>

        <div class="grid-4 flex-container-v">

            <div class="flex-container-v pam">

                                    <div class="flex-container-v">
                        <input type="hidden" value="<?= (isset($quizz1) && !empty($quizz1))? $quizz1['id'] : '' ; ?>" name="id1">

                        <label for="question1" class="question txtcenter"> Question 1</label>
                        <textarea id="question1" class="tinyChildAgri" name="question1"><?= (isset($quizz1) && !empty($quizz1))? ucfirst($quizz1['content']) : '' ; ?>
                        </textarea>

                        <div class="flex-container-v ptm">
                                <label for="answer1" class="reponse pbs txtcenter"> Réponse</label>
                                <div class="flex-container">
                                    <div class="left pll">
                                        OUI <input type="radio" name=" answer1" value="oui" <?=(!empty($quizz1) && $quizz1['answer']=='oui')? 'checked': '';?>>
                                    </div>
                                    <div class="right prl">
                                        <input type="radio" name="answer1" value="non" <?=(!empty($quizz1) && $quizz1['answer']=='non')? 'checked': '';?>> NON
                                    </div>
                                </div>
                        </div>

                        <label for="answer1explain" class="elementReponse txtcenter ptm"> Elément réponse</label>
                        <br>
                        <textarea id="answer1explain" name="explainAnswer1" class="tinyChildAgri"><?= (isset($quizz1) && !empty($quizz1))? $quizz1['explainAnswer'] : '' ; ?></textarea>

                    </div>
            </div>


            <div class="flex-container-v pam">

                    <div class="flex-container-v">
                        <input type="hidden" value="<?= (isset($quizz2) && !empty($quizz2))? $quizz2['id'] : '' ; ?>" name="id2">

                        <label for="question2" class="question txtcenter"> Question 2</label>
                        <br>
                        <textarea id="question2" class="tinyChildAgri" name="question2"><?= (isset($quizz2) && !empty($quizz2))? ucfirst($quizz2['content']) : '' ; ?></textarea>


                        <div class="flex-container-v ptm">
                            <label for="answer2" class="reponse pbs txtcenter"> Réponse</label>
                            <div class="flex-container">
                                <div class="left pll">
                                    OUI <input type="radio" name="answer2" value="oui" <?=(!empty($quizz2) && $quizz2['answer']=='oui')? 'checked': '';?>>
                                </div>
                                <div class="right prl">
                                    <input type="radio" name="answer2" value="non" <?=(!empty($quizz2) && $quizz2['answer']=='non')? 'checked': '';?>> NON
                                </div>
                            </div>
                        </div>

                        <label for="answer2explain" class="elementReponse txtcenter ptm"> Elément réponse</label>
                        <br>
                        <textarea id="answer2explain" name="explainAnswer2" class="tinyChildAgri"><?= (isset($quizz2) && !empty($quizz2))? $quizz2['explainAnswer'] : '' ; ?></textarea>


                    </div>
            </div>


            <div class="flex-container-v pam">



                    <div class="flex-container-v">

                        <input type="hidden" value="<?= (isset($quizz3) && !empty($quizz3))? $quizz3['id'] : '' ; ?>" name="id3">

                        <label for="question3" class="question txtcenter"> Question 3</label>
                        <br>
                        <textarea id="question3" class="tinyChildAgri" name="question3"><?= (isset($quizz3) && !empty($quizz3))? ucfirst($quizz3['content']) : '' ; ?></textarea>

                        <div class="flex-container-v ptm">
                            <label for="answer3" class="reponse pbs txtcenter"> Réponse</label>
                            <div class="flex-container">
                                <div class="left pll">
                                    OUI <input type="radio" name="answer3" value="oui" <?=(!empty($quizz3) && $quizz3['answer']=='oui')? 'checked': '';?>>
                                </div>
                                <div class="right prl">
                                    <input type="radio" name="answer3" value="non" <?=(!empty($quizz3) && $quizz3['answer']=='non')? 'checked': '';?>> NON
                                </div>
                            </div>
                        </div>

                        <label for="answer3explain" class="elementReponse txtcenter ptm"> Elément réponse</label>
                        <br>
                        <textarea id="answer3explain" name="explainAnswer3" class="tinyChildAgri"><?= (isset($quizz3) && !empty($quizz3))? $quizz3['explainAnswer'] : '' ; ?></textarea>

                    </div>
            </div>

            <div class="flex-container-v pam">

                    <div class="flex-container-v">

                        <input type="hidden" value="<?= (isset($quizz4) && !empty($quizz4))? $quizz4['id'] : '' ; ?>" name="id4">

                        <label for="question4" class="question txtcenter"> Question 4</label>
                        <br>
                        <textarea id="question4" class="tinyChildAgri" name="question4"><?= (isset($quizz4) && !empty($quizz4))? ucfirst($quizz4['content']) : '' ; ?></textarea>

                        <div class="flex-container-v ptm">
                            <label for="answer4" class="reponse pbs txtcenter"> Réponse</label>
                            <div class="flex-container">
                                <div class="left pll">
                                    OUI<input type="radio" name="answer4" value="oui" <?=(!empty($quizz4) && $quizz4['answer']=='oui')? 'checked': '';?>>
                                </div>
                                <div class="right prl">
                                    <input type="radio" name="answer4" value="non" <?=(!empty($quizz4) && $quizz4['answer']=='non')? 'checked': '';?>>NON
                                </div>
                            </div>
                        </div>

                        <label for="answer4explain" class="elementReponse txtcenter ptm"> Elément réponse:</label>
                        <br>
                        <textarea id="answer4explain" name="explainAnswer4" class="tinyChildAgri"><?= (isset($quizz4) && !empty($quizz4))? $quizz4['explainAnswer'] : '' ; ?></textarea>

                    </div>
            </div>

        </div>

        <!-- Bouton -->
        <div class="grid-4 flex-container-v pbm">
            <div class="flex-container-v push"></div>
            <div class="flex-container-v txtcenter">
                <button type="submit" class="bouttonEnregistrer cursor">ENREGISTRER</button>
            </div>
             <div class="flex-container-v pull"></div>
        </div>


    </form>

	<?php endif;?>





<?php $this->stop('main_content') ?>
