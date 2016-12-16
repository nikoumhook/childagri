<?php

namespace Controller;

use \W\Controller\Controller;

class QuizzController extends Controller
{
    public function quizz(){
        $this->show('front/quizz');
    }
}
