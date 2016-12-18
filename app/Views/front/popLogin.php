<div class="overlay overlay-simplegenie">
    <button type="button" class="overlay-close">Close</button>

    <div class="grid-2 flex-container-v pal">

        <!-- formulaire pour les personnes ayant deja un compte -->
        <div id="login" class="flex-container-v">
            <h2 class="txtcenter">Connection</h2>
            <form class="login" action="#" method="post">
                <label for="username">Pseudo</label>
                <input id="username" name="username" class="" type="text" required>
                <label for="password">Mot de passe</label>
                <input id="password" name="password" class="" type="password" required>
                <button type="submit">Connecter</button>
            </form>
        </div>

        <!-- formulaire pour les personnes ne possedant pas de compte -->
        <div id="subscribe" class="flex-container-v">
            <h2 class="txtcenter">Inscription</h2>
            <form class="subscribe" action="#" method="post">
                <label for="username">Pseudo</label>
                <input id="username" name="username" class="" type="text">
                <label for="email">Email (je le met mais il n'est pas obligatoire)</label>
                <input id="email" name="email" class="" type="email">
                <label for="password">Mot de passe</label>
                <input id="password" name="password" class="" type="password">
                <label for="password">Répéter votre mot de passe</label>
                <input id="password" name="password" class="" type="password">
                <span>mettre un cpatcha, quasi obligatoire vu qu'on demande pas de mail n'y rien sa veut dire qu'on peut se faire attaquer par les robots facilement</span>
                <div class="">
                    L'adresse email ,n'est pas obligatoire mais si tu n'en indique pas memorise bien ton mot de passe.
                </div>
                <button type="submit">Connecter</button>
            </form>
        </div>
    </div>

</div>

<script src="<?= $this->assetUrl('js/classie.js') ?>"></script>
<script src="<?= $this->assetUrl('js/demo1.js') ?>"></script>
