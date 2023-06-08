<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
class SecurityController extends AppController{
    public function login(){
        $user = new User("abc","abc","abc","abc");

        var_dump($_POST);
        die();
    }
}