<?php $this->layout('front', ['title' => 'Resultat du quizz']) ?>

<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/quizz.css') ?>">
<?php $this->stop('head') ?>

<?php $this->start('main_content'); ?>
<div id="titreGlobal">
    <h1>Résultats du Quizz</h1>
</div>

<?php foreach ($question as $questions): ?>
    <?php if(!empty($questions)): ?>
        <h4><?php echo($questions[0]['ingredient']); ?></h4><br>
    <div class="globalResult">
        <div class="containerAliment">
            <?php echo($questions[0]['content']); ?>
            <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$questions[0]['id']]?><span></p>
            <?php if($questions[0]['answer'] === $_SESSION['results'][$questions[0]['id']]):?>
                <p style="color:green;">Bravo tu as bien répondu</p>
            <?php else: ?>
                <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$questions[0]['explainAnswer']?></span><br>
            <?php endif;?><br>
        </div>
        <br>
        <div class="containerAliment">
            <?php echo($questions[1]['content']); ?>
            <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$questions[1]['id']]?><span></p>
            <?php if($questions[1]['answer'] === $_SESSION['results'][$questions[1]['id']]):?>
                <p style="color:green;">Bravo tu as bien répondu</p>
            <?php else: ?>
                <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$questions[1]['explainAnswer']?></span><br>
            <?php endif;?><br>
        </div>
        <br>
        <div class="containerAliment">
            <?php echo($questions[2]['content']); ?>
            <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$questions[2]['id']]?><span></p>
            <?php if($questions[2]['answer'] === $_SESSION['results'][$questions[2]['id']]):?>
                <p style="color:green;">Bravo tu as bien répondu</p>
            <?php else: ?>
                <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$questions[2]['explainAnswer']?></span><br>
            <?php endif;?><br>
        </div>
        <br>
        <div class="containerAliment">
            <?php echo($questions[3]['content']); ?>
            <p style="color: lightgrey; font-size: 0.6em;">Tu as répondu: <span style="text-decoration: underline;"><?=$_SESSION['results'][$questions[3]['id']]?><span></p>
            <?php if($questions[3]['answer'] === $_SESSION['results'][$questions[3]['id']]):?>
                <p style="color:green;">Bravo tu as bien répondu</p>
            <?php else: ?>
                <p style="color:red;">Tu as fais une erreur,</p><span style="color: lightgrey; font-size: 0.6em;"><?=$questions[3]['explainAnswer']?></span><br>
            <?php endif;?><br>
        </div>
        <br>
    </div>
    <?php endif; ?>
<?php endforeach; ?>
<div id="success"></div>
    <button type="button" id="save">Sauvegarder</button>
    <a href="<?= $this->url('game_reset');?>"><button type="button" id="reset">Reset</button></a>

<?php $this->stop('main_content') ?>
<?php $this->start('script') ?>
<!-- Script Affichage validation formulaire connexion en Ajax -->
<script>
    $(function(){

        $('#save').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '<?=$this->url('ajax_saveresultat');?>',
                type: 'post',
                cache:false,
                dataType: 'json',
                success: function(result){
                    if(result.success == 'true'){
                        $('#success').hml("enregistré !");
                    }else{
                        $('#success').hml("Probleme d'enregistrement, désolé, nous en avont pris note nous allons corrigé ce petit soucis !");
                    };
                }//fermeture success
            });//fermeture $.ajax
        });// fermeture buttton clic

    });//fermeture document.ready
</script>
<?php $this->stop('script') ?>
