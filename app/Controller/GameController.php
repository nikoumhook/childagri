<?php

namespace Controller;

use \W\Controller\Controller;

class GameController extends Controller
{

    public function assiette(){
        $this->show('front/assiette');
    }

    public function carte(){
        $this->show('front/carte');
    }

}
