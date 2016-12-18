<?php $this->layout('back', ['title' => 'Administration du site']) ?>

<?php $this->start('main_content') ?>

	<h1 class="txtcenter">BIENVENUE SUR VOTRE BACKOFFICE</h1>
	<div class="txtcenter accueil pbs"> Vous allez pouvoir administrer les contenus de votre application en trois coups de cuillère à pot !!<br>Choississez le menu dont vous avez besoin et laissez guider.</div>

	<div class="grid-4-small-2">

		    <div class="columnHomeBack pam">
		        <div class="containerInColumn pas">
		            <div class="illus pal"><img src="<?= $this->assetUrl('img/backoffice_cake.svg');?>" alt=""></div>
		            <div class="content mtm">
		            	<h2 class="txtcenter man">ALIMENT</h2>
		            	<ul class="man pan">
		            		<li class="txtcenter pts">
		            			<a href="<?= $this->url('back_aliment') ?>" class="<= ($w_current_route == 'back_aliment')? 'active' :''; ?>">
		            			<h3 class="man">ADMINISTRER</h3>
		            			</a>
		            		</li>
		            		<li class="txtcenter explainMenu">Enregistrez tous les aliments utilisés dans votre application</li>
		            		<li class="txtcenter ptm">
		            			<a href="<?= $this->url('back_listeAliment') ?>" class="<= ($w_current_route == 'back_listeAliment')? 'active' :''; ?>">
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
	            <div class="content mtm">
	            	<h2 class="txtcenter man">PEDAGO</h2>
	            	<ul class="man pan">
	            		<li class="txtcenter pts">
	            			<a href="<?= $this->url('back_zonePedago') ?>" class="<= ($w_current_route == 'back_zonePedago')? 'active' :''; ?>">
	            			<h3 class="man">ADMINISTRER</h3>
	            			</a>
	            		</li>
	            		<li class="txtcenter explainMenu">Enregistrez tous les contenus utilisés dans votre application</li>
	            		</li>
	            		<li class="txtcenter ptm">
	            			<a href="<?= $this->url('back_listePedago') ?>" class="<= ($w_current_route == 'back_listePedago')? 'active' :''; ?>">
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
	            <div class="content mtm">
	            	<h2 class="txtcenter man">QUIZZ</h2>
	            	<ul class="man pan">
	            		<li class="txtcenter pts">
	            			<a href="<?= $this->url('back_quizz') ?>" class="<= ($w_current_route == 'back_quizz')? 'active' :''; ?>">
	            			<h3 class="man">ADMINISTRER</h3>
	            			</a>
	            		</li>
	            		<li class="txtcenter explainMenu">Enregistrez tous les quizz utilisés dans votre application</li>
	            		<li class="txtcenter ptm">
	            			<a href="<?= $this->url('back_listeQuizz') ?>" class="<= ($w_current_route == 'back_listeQuizz')? 'active' :''; ?>">
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
	            <div class="content mtm">
	           		<h2 class="txtcenter man">JOUEUR</h2>
	            	<ul class="man pan">
	            		<li class="txtcenter pts">
	            			<a href="<?= $this->url('back_listeUser') ?>" class="<= ($w_current_route == 'back_listeQuizz')? 'active' :''; ?>">
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
