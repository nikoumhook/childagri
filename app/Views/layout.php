<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
    <?= $this->section('head') ?>
    <!-- import de knacss -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/knacss.css') ?>">

    <!-- import de style perso -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>

        <?= $this->fetch('front/popLogin') ?>

</body>
</html>
