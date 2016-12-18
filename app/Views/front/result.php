<?php $this->layout('quizz', ['title' => 'Resultat du quizz']) ?>

<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/quizz.css') ?>">
<?php $this->stop('head') ?>

<?php $this->start('main_content'); ?>
<pre>
<?php
//var_dump($_SESSION);
var_dump($question);
var_dump($_SESSION['results']);
echo 'question1<br>';
if ($question[0]['answer'] === $_SESSION['results'][81]) {
    echo 'bonne réponse<br>';
}
else{
    echo 'mauvaise réponse<br>';
}
echo 'question2<br>';
echo 'question3<br>';
echo 'question4<br>';
?>
</pre>

<?php $this->stop('main_content') ?>
