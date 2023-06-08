<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function index() {
        $this->render('login', ['message' => "Hello World 22"]);
    }

    public function home(){
        $this->render('home-dashboard');
    }
}