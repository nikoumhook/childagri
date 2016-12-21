<?php $this->layout('back', ['title' => 'Administration du site']) ?>

<?php $this->start('main_content') ?>

	<h1 class="txtcenter pas"><?=strtoupper($w_user['username']);?> BIENVENUE SUR VOTRE BACKOFFICE</h1>
	<div class="txtcenter accueil pbs"> Vous allez pouvoir administrer les contenus de votre application en trois coups de cuillère à pot !!<br>Choisissez le menu dont vous avez besoin et laissez-vous guider.</div>

	<div class="grid-4-small-2">

		    <div class="columnHomeBack pam">
		        <div class="containerInColumn pas">
		            <div class="illus pal"><img src="<?= $this->assetUrl('img/backoffice_cake.svg');?>" alt=""></div>
		            <div class="content pas mtm">
		            	<h2 class="txtcenter man">ALIMENT</h2>
		            	<ul class="man pan">
		            		<li class="txtcenter pts">
		            			<a href="<?= $this->url('back_aliment') ?>">
		            			<h3 class="man">ADMINISTRER</h3>
		            			</a>
		            		</li>
		            		<li class="txtcenter explainMenu">Enregistrez tous les aliments utilisés dans votre application</li>
		            		<li class="txtcenter ptm">
		            			<a href="<?= $this->url('back_listeAliment') ?>">
		            			<h3 class="man">LISTE</h3>
		            			</a>
		            		</li>
		            		<li class="txtcenter explainMenu">Utilisez la liste des aliments pour pouvoir les modifier rapidement</li>
		            	</ul>
		            </div>
		        </div>
		    </div>



	    <div class="columnHomeBack pam">
	        <div class="containerInColumn pas">
	            <div class="illus pal"><img src="<?= $this->assetUrl('img/backoffice_clipboard.svg');?>" alt=""></div>
	            <div class="content pas mtm">
	            	<h2 class="txtcenter man">PEDAGO</h2>
	            	<ul class="man pan">
	            		<li class="txtcenter pts">
	            			<a href="<?= $this->url('back_zonePedago') ?>">
	            			<h3 class="man">ADMINISTRER</h3>
	            			</a>
	            		</li>
	            		<li class="txtcenter explainMenu">Enregistrez tous les contenus utilisés dans votre application</li>
	            		</li>
	            		<li class="txtcenter ptm">
	            			<a href="<?= $this->url('back_listePedago') ?>">
	            			<h3 class="man">LISTE</h3>
	            			</a>
	            		</li>
	            		<li class="txtcenter explainMenu">Utilisez la liste des contenus pour pouvoir les modifier rapidement</li>
	            	</ul>

	            </div>
	        </div>
	    </div>

	    <div class="columnHomeBack pam">
	        <div class="containerInColumn pas">
	            <div class="illus pal"><img src="<?= $this->assetUrl('img/backoffice_trophy.svg');?>" alt=""></div>
	            <div class="content pas mtm">
	            	<h2 class="txtcenter man">QUIZZ</h2>
	            	<ul class="man pan">
	            		<li class="txtcenter pts">
	            			<a href="<?= $this->url('back_quizz') ?>">
	            			<h3 class="man">ADMINISTRER</h3>
	            			</a>
	            		</li>
	            		<li class="txtcenter explainMenu">Enregistrez tous les quizz utilisés dans votre application</li>
	            		<li class="txtcenter ptm">
	            			<a href="<?= $this->url('back_listeQuizz') ?>">
	            			<h3 class="man">LISTE</h3>
	            			</a>
	            		</li>
	            		<li class="txtcenter explainMenu">Utilisez la liste des quizz pour pouvoir les modifier rapidement</li>
	            	</ul>

	            </div>
	        </div>
	    </div>

	    <div class="columnHomeBack pam">
	        <div class="containerInColumn pas">
	            <div class="illus pal"><img src="<?= $this->assetUrl('img/backoffice_user.svg');?>" alt=""></div>
	            <div class="content pas mtm">
	           		<h2 class="txtcenter man">JOUEUR</h2>
	            	<ul class="man pan">
	            		<li class="txtcenter pts">
	            			<a href="<?= $this->url('back_listeUser') ?>">
	            			<h3 class="man">LISTE</h3>
	            			</a>
	            		</li>
	            		<li class="txtcenter explainMenu">Utilisez la liste des joueurs et accéder à leurs informations</li>
	            		<li class="txtcenter ptm">
	            			<a href="<?= $this->url('userlist') ?>">
	            			<h3 class="man">LISTE</h3>
	            			</a>
	            		</li>
	            		<li class="txtcenter explainMenu">Utilisez la liste des joueurs et accéder à leurs informations</li>
	            	</ul>

	            </div>
	        </div>
	    </div>
	</div>
<?php $this->stop('main_content') ?>
