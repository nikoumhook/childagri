<?php $this->layout('back', ['title' => 'Administration du site']) ?>

<?php $this->start('main_content') ?>

	<div class="grid-5-small-2">

	    <div class="columnHomeBack pam">
	        <div class="containerInColumn">
	            <div class="illus"><img src="" alt=""></div>
	            <div class="content">
	            	CONFIGURER VOTRE APPLICATION
	            </div>
	        </div>
	    </div>

	    <div class="columnHomeBack pam">
	        <div class="containerInColumn">
	            <div class="illus"><img src="" alt=""></div>
	            <div class="content">
	            	<ul>
	            		<li><a href="<?= $this->url('back_aliment') ?>" class="<= ($w_current_route == 'back_aliment')? 'active' :''; ?>">ADMINISTRER VOS ALIMENTS</a></li>
	            		<li>LISTE DES ALIMENTS</li>
	            	</ul>
	            </div>
	        </div>
	    </div>


	    <div class="columnHomeBack pam">
	        <div class="containerInColumn">
	            <div class="illus"><img src="" alt=""></div>
	            <div class="content">
	            	<ul>
	            		<li><a href="<?= $this->url('back_zonePedago') ?>" class="<= ($w_current_route == 'back_zonePedago')? 'active' :''; ?>">ADMINISTRER VOS CONTENUS PEDAGOGIQUES</a></li>
	            		<li>LISTE DE VOS CONTENUS PEDAGOGIQUES</li>
	            	</ul>
	            	
	            </div>
	        </div>
	    </div>


	    <div class="columnHomeBack pam">
	        <div class="containerInColumn">
	            <div class="illus"><img src="" alt=""></div>
	            <div class="content">
	            	<ul>
	            		<li><a href="<?= $this->url('back_quizz') ?>" class="<= ($w_current_route == 'back_quizz')? 'active' :''; ?>">ADMINISTRER VOS QUIZZ</a></li>
	            		<li>LISTE DE VOS QUIZZ</li>
	            	</ul>
	            	
	            </div>
	        </div>
	    </div>

	    <div class="columnHomeBack pam">
	        <div class="containerInColumn">
	            <div class="illus"><img src="" alt=""></div>
	            <div class="content">
	            	LISTE DES JOUEURS INSCRITS
	            </div>
	        </div>
	    </div>
	</div>
<?php $this->stop('main_content') ?>
