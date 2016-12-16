<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
    <?= $this->section('head') ?>
    <!-- import de knacss -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/knacss.css') ?>">

	<?= $this->section('head') ?>

    <!-- import de style perso -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<div class="container">

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>


</body>
</html>
