<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
class SecurityController extends AppController{
    public function login(){
        $user = new User('abc','abc','abc','abc');

        $email = $_POST['email'];
        $password = $_POST['password'];

        if($user->getEmail() !== $email){
            return $this->render('login',['messages'=>['Email incorrect']]);
        }

        if($user->getPassword() !== $password){
            return $this->render('login',['messages'=>['Password incorrect']]);
        }

        return $this->render('home-dashboard');
    }
}