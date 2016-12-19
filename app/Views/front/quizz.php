<?php $this->layout('front', ['title' => 'quizz']) ?>

<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/quizz.css') ?>">
<?php $this->stop('head') ?>

<?php $this->start('main_content'); ?>
<div class="containerQuizz">
    <div class="debug">
        <pre>
            <?php var_dump($_SESSION) ?>
        </pre>
    </div>
    <div id="quizzForm" class="pal">
        <legend><h1>Quizz</h1></legend><hr>
        <form class="" action="index.html" method="post">
            <?php if(!empty($question1)): ?>
                <div class="quizAliment">
                    <h3><?php echo $question1[0]['ingredient'] ?></h3>
                    <?php foreach($question1 as $value): ?>
                        <label for="<?=$value['id']?>"><?=$value['content']?></label>
                        <input type="radio" name="<?=$value['id']?>" value="true" checked> Oui
                        <input type="radio" name="<?=$value['id']?>" value="false"> Non<br><br>
                    <?php endforeach;?>
                </div>
            <?php endif; ?>
            <?php if(!empty($question2)): ?>
                <div class="quizAliment">
                    <h3><?php echo $question2[0]['ingredient'] ?></h3>
                    <?php foreach($question2 as $value): ?>
                        <label for="<?=$value['id']?>"><?=$value['content']?></label>
                        <input type="radio" name="<?=$value['id']?>" value="true" checked> Oui
                        <input type="radio" name="<?=$value['id']?>" value="false"> Non<br><br>
                    <?php endforeach;?>
                </div>
            <?php endif; ?>
            <?php if(!empty($question3)): ?>
                <div class="quizAliment">
                    <h3><?php echo $question3[0]['ingredient'] ?></h3>
                    <?php foreach($question3 as $value): ?>
                        <label for="<?=$value['id']?>"><?=$value['content']?></label>
                        <input type="radio" name="<?=$value['id']?>" value="true" checked> Oui
                        <input type="radio" name="<?=$value['id']?>" value="false"> Non<br>
                    <?php endforeach;?>
                </div>
                <br>
            <?php endif; ?>
            <button type="submit" name="button">Répondre</button>
        </form>

    </div>
</div>
<?php $this->stop('main_content') ?>
