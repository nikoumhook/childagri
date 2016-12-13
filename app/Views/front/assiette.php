<?php $this->layout('front', ['title' => 'Jeu assiette']) ?>

<?php $this->start('head') ?>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/assiette.css') ?>">
<?php $this->stop('head') ?>


<?php $this->start('script') ?>
<?php $this->stop('script') ?>

<?php $this->start('main_content') ?>
    <?= var_dump($_SESSION); ?>
    <div id="container_assiette" class="pal">
        <div id="dragZone">
            <div class="aliments" id="aliment1"></div>
            <div class="aliments" id="aliment2"></div>
            <div class="aliments" id="aliment3"></div>
        </div>
        <img src="<?= $this->assetUrl('img/element_assiette.jpg') ?>" alt="">
    </div>

<?php $this->stop('main_content') ?>
