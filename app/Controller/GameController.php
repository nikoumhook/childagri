<?php

namespace Controller;

use \W\Controller\Controller;

class GameController extends Controller
{

    public function home(){
        $this->show('front/home');
    }

}
