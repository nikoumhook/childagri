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
            <h4><?php echo($question[1][0]['ingredient']); ?></h4><br>
            <div class="questionUnite">
                <?php echo($question[1][0]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[1][0]['id']]?><span></p>
                <?php if($question[1][0]['answer'] === $_SESSION['results'][$question[1][0]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[1][0]['answer'] != $_SESSION['results'][$question[1][0]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[1][0]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[1][1]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[1][1]['id']]?><span></p>
                <?php if($question[1][1]['answer'] === $_SESSION['results'][$question[1][1]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[1][1]['answer'] != $_SESSION['results'][$question[1][1]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[1][1]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[1][2]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[1][2]['id']]?><span></p>
                <?php if($question[1][2]['answer'] === $_SESSION['results'][$question[1][2]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[1][2]['answer'] != $_SESSION['results'][$question[1][2]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[1][2]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[1][3]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[1][3]['id']]?><span></p>
                <?php if($question[1][3]['answer'] === $_SESSION['results'][$question[1][3]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[1][3]['answer'] != $_SESSION['results'][$question[1][3]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[1][3]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
        </div>
        <div class="containerAliment">
            <h4><?php echo($question[2][0]['ingredient']); ?></h4><br>
            <div class="questionUnite">
                <?php echo($question[2][0]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[2][0]['id']]?><span></p>
                <?php if($question[2][0]['answer'] === $_SESSION['results'][$question[2][0]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[2][0]['answer'] != $_SESSION['results'][$question[2][0]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[2][0]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[2][1]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[2][1]['id']]?><span></p>
                <?php if($question[2][1]['answer'] === $_SESSION['results'][$question[2][1]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[2][1]['answer'] != $_SESSION['results'][$question[2][1]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[2][1]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[2][2]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[2][2]['id']]?><span></p>
                <?php if($question[2][2]['answer'] === $_SESSION['results'][$question[2][2]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[2][2]['answer'] != $_SESSION['results'][$question[2][2]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[2][2]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[2][3]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[2][3]['id']]?><span></p>
                <?php if($question[2][3]['answer'] === $_SESSION['results'][$question[2][3]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[2][3]['answer'] != $_SESSION['results'][$question[2][3]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[2][3]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
        </div>
        <div class="containerAliment">
            <h4><?php echo($question[3][0]['ingredient']); ?></h4><br>
            <div class="questionUnite">
                <?php echo($question[3][0]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[3][0]['id']]?><span></p>
                <?php if($question[3][0]['answer'] === $_SESSION['results'][$question[3][0]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[3][0]['answer'] != $_SESSION['results'][$question[3][0]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[3][0]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[3][1]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[3][1]['id']]?><span></p>
                <?php if($question[3][1]['answer'] === $_SESSION['results'][$question[3][1]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[3][1]['answer'] != $_SESSION['results'][$question[3][1]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[3][1]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[3][2]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[3][2]['id']]?><span></p>
                <?php if($question[3][2]['answer'] === $_SESSION['results'][$question[3][2]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[3][2]['answer'] != $_SESSION['results'][$question[3][2]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[3][2]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[3][3]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[3][3]['id']]?><span></p>
                <?php if($question[3][3]['answer'] === $_SESSION['results'][$question[3][3]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[3][3]['answer'] != $_SESSION['results'][$question[3][3]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[3][3]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['save']['repas'][2])): ?>
    <div class="containerResult">
        <h3>Déjeuner</h3>
        <div class="containerAliment">
            <h4><?php echo($question[4][0]['ingredient']); ?></h4><br>
            <div class="questionUnite">
                <?php echo($question[4][0]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[4][0]['id']]?><span></p>
                <?php if($question[4][0]['answer'] === $_SESSION['results'][$question[4][0]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[4][0]['answer'] != $_SESSION['results'][$question[4][0]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[4][0]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[4][1]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[4][1]['id']]?><span></p>
                <?php if($question[4][1]['answer'] === $_SESSION['results'][$question[4][1]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[4][1]['answer'] != $_SESSION['results'][$question[4][1]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[4][1]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[4][2]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[4][2]['id']]?><span></p>
                <?php if($question[4][2]['answer'] === $_SESSION['results'][$question[4][2]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[4][2]['answer'] != $_SESSION['results'][$question[4][2]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[4][2]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[4][3]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[4][3]['id']]?><span></p>
                <?php if($question[4][3]['answer'] === $_SESSION['results'][$question[4][3]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[4][3]['answer'] != $_SESSION['results'][$question[4][3]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[4][3]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
        </div>
        <div class="containerAliment">
            <h4><?php echo($question[5][0]['ingredient']); ?></h4><br>
            <div class="questionUnite">
                <?php echo($question[5][0]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[5][0]['id']]?><span></p>
                <?php if($question[5][0]['answer'] === $_SESSION['results'][$question[5][0]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[5][0]['answer'] != $_SESSION['results'][$question[5][0]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[5][0]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[5][1]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[5][1]['id']]?><span></p>
                <?php if($question[5][1]['answer'] === $_SESSION['results'][$question[5][1]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[5][1]['answer'] != $_SESSION['results'][$question[5][1]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[5][1]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[5][2]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[5][2]['id']]?><span></p>
                <?php if($question[5][2]['answer'] === $_SESSION['results'][$question[5][2]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[5][2]['answer'] != $_SESSION['results'][$question[5][2]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[5][2]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
            <div class="questionUnite">
                <?php echo($question[5][3]['content']); ?>
                <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$question[5][3]['id']]?><span></p>
                <?php if($question[5][3]['answer'] === $_SESSION['results'][$question[5][3]['id']]):?>
                    <p style="color:green;">Bravo tu as bien répondu</p>
                <?php endif;?>
                <?php if($question[5][3]['answer'] != $_SESSION['results'][$question[5][3]['id']]):?>
                    <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$question[5][3]['explainAnswer']?></span><br>
                <?php endif;?><br>
            </div>
        </div>
        <?php if(!empty($question[6])): ?>
        <div>
            <h4><?php echo($question[6][0]['ingredient']); ?></h4><br>
            <?php echo($question[6][0]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[6][1]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[6][2]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[6][3]['content']); ?><p style="color:green;">V Vrai</p><br>
        </div>
    <?php endif; ?>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['save']['repas'][3])): ?>
    <div class="containerResult">
        <h3>Gouter</h3>
        <div class="containerAliment">
            <h4><?php echo($question[1][0]['ingredient']); ?></h4><br>
            <?php echo($question[1][0]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[1][1]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[1][2]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[1][3]['content']); ?><p style="color:green;">V Vrai</p><br>
        </div>
        <div>
            <h4><?php echo($question[2][0]['ingredient']); ?></h4><br>
            <?php echo($question[2][0]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[2][1]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[2][2]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[2][3]['content']); ?><p style="color:green;">V Vrai</p><br>
        </div>
        <div>
            <h4><?php echo($question[3][0]['ingredient']); ?></h4><br>
            <?php echo($question[3][0]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[3][1]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[3][2]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[3][3]['content']); ?><p style="color:green;">V Vrai</p><br>
        </div>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['save']['repas'][4])): ?>
    <div class="containerResult">
        <h3>Diner</h3>
        <h4><?php echo($question1[0]['ingredient']); ?></h4><br>
        <div class="containerAliment">
            <h4><?php echo($question[1][0]['ingredient']); ?></h4><br>
            <?php echo($question[1][0]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[1][1]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[1][2]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[1][3]['content']); ?><p style="color:green;">V Vrai</p><br>
        </div>
        <div>
            <h4><?php echo($question[2][0]['ingredient']); ?></h4><br>
            <?php echo($question[2][0]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[2][1]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[2][2]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[2][3]['content']); ?><p style="color:green;">V Vrai</p><br>
        </div>
        <div>
            <h4><?php echo($question[3][0]['ingredient']); ?></h4><br>
            <?php echo($question[3][0]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[3][1]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[3][2]['content']); ?><p style="color:green;">V Vrai</p><br>
            <?php echo($question[3][3]['content']); ?><p style="color:green;">V Vrai</p><br>
        </div>
    </div>
    <?php endif; ?>
</div>





<pre>
<?php
var_dump($_SESSION);
//var_dump($question[5]);
// $_SESSION['results'][86] = 'oui';
// $_SESSION['results'][87] = 'oui';
// $_SESSION['results'][88] = 'oui';
// $_SESSION['results'][89] = 'oui';
// $_SESSION['results'][90] = 'oui';
// $_SESSION['results'][91] = 'oui';
// $_SESSION['results'][92] = 'oui';
// $_SESSION['results'][93] = 'oui';
// $_SESSION['results'][94] = 'oui';
// $_SESSION['results'][95] = 'oui';
// $_SESSION['results'][96] = 'oui';
// $_SESSION['results'][97] = 'oui';
?>
</pre>







<?php $this->stop('main_content') ?>
