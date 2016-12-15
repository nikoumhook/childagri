<?php $this->layout('back', ['title' => 'Administration du site']) ?>

<?php $this->start('main_content') ?>

	<div class="grid-4-small-2">


	    <div class="columnHomeBack pam">
	        <div class="containerInColumn">
	            <div class="illus"><img src="" alt=""></div>
	            <div class="content">
	            	<ul>
	            		<li><a href="<?= $this->url('back_aliment') ?>" class="<= ($w_current_route == 'back_aliment')? 'active' :''; ?>">ADMINISTRER LES ALIMENTS</a></li>
	            		<li><a href="<?= $this->url('back_listeAliment') ?>" class="<= ($w_current_route == 'back_listeAliment')? 'active' :''; ?>">LISTE DES ALIMENTS</a></li>
	            	</ul>
	            </div>
	        </div>
	    </div>


	    <div class="columnHomeBack pam">
	        <div class="containerInColumn">
	            <div class="illus"><img src="" alt=""></div>
	            <div class="content">
	            	<ul>
	            		<li><a href="<?= $this->url('back_zonePedago') ?>" class="<= ($w_current_route == 'back_zonePedago')? 'active' :''; ?>">ADMINISTRER LES CONTENUS PEDAGOGIQUES</a></li>
	            		<li><a href="<?= $this->url('back_listePedago') ?>" class="<= ($w_current_route == 'back_listePedago')? 'active' :''; ?>">LISTE DES CONTENUS PEDAGOGIQUES</a></li>
	            	</ul>
	            	
	            </div>
	        </div>
	    </div>


	    <div class="columnHomeBack pam">
	        <div class="containerInColumn">
	            <div class="illus"><img src="" alt=""></div>
	            <div class="content">
	            	<ul>
	            		<li><a href="<?= $this->url('back_quizz') ?>" class="<= ($w_current_route == 'back_quizz')? 'active' :''; ?>">ADMINISTRER LES QUIZZ</a></li>
	            		<li><a href="<?= $this->url('back_listeQuizz') ?>" class="<= ($w_current_route == 'back_listeQuizz')? 'active' :''; ?>">LISTE DES QUIZZ</a></li>
	            	</ul>
	            	
	            </div>
	        </div>
	    </div>

	    <div class="columnHomeBack pam">
	        <div class="containerInColumn">
	            <div class="illus"><img src="" alt=""></div>
	            <div class="content">
	            	<ul>
	            		<li><a href="<?= $this->url('back_listeUser') ?>" class="<= ($w_current_route == 'back_listeQuizz')? 'active' :''; ?>">LISTE DES JOUEURS INSCRITS</a></li>
	            	</ul>
	            	
	            </div>
	        </div>
	    </div>
	</div>
<?php $this->stop('main_content') ?>
