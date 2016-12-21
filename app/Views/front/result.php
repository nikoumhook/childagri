<?php $this->layout('front', ['title' => 'Resultat du quizz']) ?>

<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/quizz.css') ?>">
<?php $this->stop('head') ?>

<?php $this->start('main_content'); ?>

    <div id="mbl navTopBar">
        <div class="pas flex-container-v displayNoneSmall">
            <div class="center-wrap">
              <div class="title-container">
                <div class="ribbon-left"></div>
                <div class="backflag-left"></div>
                <div class="title"><?= strtoupper($_SESSION['player']['username']);?> VOICI LES RESULTATS DE TON QUIZZ !
                 <span class="sous-title">
                    Tu peux jouer encore et encore !
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


    <div class="mal ContainerResult">

    <?php foreach ($question as $questions): ?>

    <?php if(!empty($questions)): ?>

        <h1 class="txtcenter"><?= ucwords($questions[0]['ingredient']); ?></h1>

            <div class="grid-4 flex-container-v">

                <div class="pas txtcenter">
                    <h2 class="txtcenter"><?=($questions[0]['content']); ?></h2>
                    <div class="grid-4 reponseUser">
                        <div class="push"><h3>Ta réponse</h3></div>
                        <div class="pull resultQuestion">
                        <?=$_SESSION['results'][$questions[0]['id']]?>
                        </div>
                    </div>

                    <?php if($questions[0]['answer'] === $_SESSION['results'][$questions[0]['id']]):?>
                        <div class="bravo">Bravo tu as tout compris</div>

                    <?php else: ?>
                        <div class="zut">Tu as fait une erreur</div>

                    <div class="reponseQuestion"><?=$questions[0]['explainAnswer']?></div>

                    <?php endif;?>
                </div> <!-- Fermeture bloc1 -->


                <div class="pas txtcenter">
                    <h2 class="txtcenter"><?=($questions[1]['content']); ?></h2>
                    <div class="grid-4 reponseUser">
                        <div class="push"><h3>Ta réponse</h3></div>
                        <div class="pull resultQuestion">
                            <?=$_SESSION['results'][$questions[1]['id']]?>
                        </div>
                    </div>

                    <?php if($questions[1]['answer'] === $_SESSION['results'][$questions[1]['id']]):?>
                        <div class="bravo">Bravo tu as tout compris</div>

                    <?php else: ?>
                         <div class="zut">Tu as fait une erreur</div>

                    <div class="reponseQuestion">
                        <?=$questions[1]['explainAnswer']?>
                    </div>
                    <?php endif;?>
                </div> <!-- Fermeture bloc2 -->

                <div class="pas txtcenter">

                    <h2 class="txtcenter"><?=($questions[2]['content']); ?></h2>
                    <div class="grid-4 reponseUser">
                        <div class="push"><h3>Ta réponse</h3></div>
                        <div class="pull resultQuestion">
                            <?=$_SESSION['results'][$questions[2]['id']]?>
                        </div>
                    </div>

                    <?php if($questions[2]['answer'] === $_SESSION['results'][$questions[2]['id']]):?>
                        <div class="bravo">Bravo tu as tout compris</div>

                    <?php else: ?>
                        <div class="zut">Tu as fait une erreur</div>

                    <div class="reponseQuestion">
                        <?=$questions[2]['explainAnswer']?>
                    </div>
                    <?php endif;?>

                </div><!-- Fermeture bloc3 -->

                <div class="pas txtcenter">

                    <h2 class="txtcenter"><?=($questions[3]['content']); ?></h2>
                    <div class="grid-4 reponseUser">
                        <div class="push"><h3>Ta réponse</h3></div>
                        <div class="pull resultQuestion">
                            <?=$_SESSION['results'][$questions[3]['id']]?>
                        </div>
                    </div>

                    <?php if($questions[3]['answer'] === $_SESSION['results'][$questions[3]['id']]):?>
                        <div class="bravo">Bravo tu as tout compris</div>

                    <?php else: ?>
                          <div class="zut">Tu as fait une erreur</div>
                    <div class="reponseQuestion">
                        <?=$questions[3]['explainAnswer']?>
                    </div>
                    <?php endif;?>
                </div><!-- Fermeture bloc4 -->

            </div> <!-- Fermeture Grid4 -->

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
