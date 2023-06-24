<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function index() {
        $this->render('login');
    }

    public function home(){
        $this->render('home-dashboard');
    }

    public function register(){
        $this->render('register');
    }
}