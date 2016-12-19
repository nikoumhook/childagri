<?php $this->layout('quizz', ['title' => 'Resultat du quizz']) ?>

<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/quizz.css') ?>">
<?php $this->stop('head') ?>

<?php $this->start('main_content'); ?>
<div id="titreGlobal">
    <h1>Résultats du Quizz</h1>
</div>
<div id="globalResult">
    <?php if (isset($_SESSION['save']['repas'][1])): ?>
    <div class="containerResult">
        <h3>Petit Déjeuner</h3>
            <div class="containerAliment">
                <h4><?php echo($question1[0]['ingredient']); ?></h4><br>
                <?php echo($question1[0]['content']); ?><p style="color:green;">V Vrai</p><br>
                <?php echo($question1[1]['content']); ?><p style="color:green;">V Vrai</p><br>
                <?php echo($question1[2]['content']); ?><p style="color:green;">V Vrai</p><br>
                <?php echo($question1[3]['content']); ?><p style="color:green;">V Vrai</p><br>
            </div>
            <div>
                <h4><?php echo($question2[0]['ingredient']); ?></h4><br>
                <?php echo($question2[0]['content']); ?><p style="color:green;">V Vrai</p><br>
            </div>
            <div>
                <h4><?php echo($question3[0]['ingredient']); ?></h4><br>
                <?php echo($question3[0]['content']); ?><p style="color:green;">V Vrai</p><br>
            </div>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['save']['repas'][2])): ?>
    <div class="containerResult">
        <h3>Déjeuner</h3>
        <h4><?php echo($question[1]['ingredient']); ?></h4><br>
        <?php echo($question4[0]['content']); ?><p style="color:green;">V Vrai</p><br>
        <h4><?php echo($question5[0]['ingredient']); ?></h4><br>
        <?php echo($question5[0]['content']); ?><p style="color:green;">V Vrai</p><br>
        <h4><?php echo($question6[0]['ingredient']); ?></h4><br>
        <?php echo($question6[0]['content']); ?><p style="color:green;">V Vrai</p><br>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['save']['repas'][3])): ?>
    <div class="containerResult">
        <h3>Gouter</h3>
        <h4><?php echo($question1[0]['ingredient']); ?></h4><br>
        <?php echo($question7[0]['content']); ?><p style="color:green;">V Vrai</p><br>
        <h4><?php echo($question1[0]['ingredient']); ?></h4><br>
        <?php echo($question8[0]['content']); ?><p style="color:green;">V Vrai</p><br>
        <h4><?php echo($question1[0]['ingredient']); ?></h4><br>
        <?php echo($question9[0]['content']); ?><p style="color:green;">V Vrai</p><br>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['save']['repas'][4])): ?>
    <div class="containerResult">
        <h3>Diner</h3>
        <h4><?php echo($question1[0]['ingredient']); ?></h4><br>
        <?php echo($question10[0]['content']); ?><p style="color:green;">V Vrai</p><br>
        <h4><?php echo($question1[0]['ingredient']); ?></h4><br>
        <?php echo($question11[0]['content']); ?><p style="color:green;">V Vrai</p><br>
        <h4><?php echo($question1[0]['ingredient']); ?></h4><br>
        <?php echo($question12[0]['content']); ?><p style="color:green;">V Vrai</p><br>
    </div>
    <?php endif; ?>
</div>





<pre>
<?php
var_dump($_SESSION);
var_dump($_SESSION['test']);
var_dump($question);
?>
</pre>







<?php $this->stop('main_content') ?>
