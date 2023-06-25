<?php

require_once __DIR__.'/../models/User.php';

class Controller {
    private $request;

    public function __construct(){
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isPost():bool{
        return $this->request === 'POST';
    }

    protected function isGet():bool{
        return $this->request === 'GET';
    }

    protected function render(string $template = null, array $variables = []){
        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found';

        if(file_exists($templatePath)){
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }

    public function login(){
        $user = new User('abc','abc','abc','abc');


        if($this->isGet()){
            return $this->login();
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        if($user->getEmail() !== $email){
            return $this->render('login',['messages'=>['Email incorrect']]);
        }

        if($user->getPassword() !== $password){
            return $this->render('login',['messages'=>['Password incorrect']]);
        }

        //return $this->render('home-dashboard');
        $url = "http://$_SERVER[HTTP_HOST]";
        header ("Location: {$url}/home");
    }
    
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

class Routing {
    public static $routes;

    public static function get($url, $controller){
        self::$routes[$url] = $controller;  
    }

    public static function post($url, $controller){
        self::$routes[$url] = $controller;  
    }

    public static function run($url) {
        $action = explode("/", $url)[0];

        if(!array_key_exists($action, self::$routes)){
            die("Incorrect URL");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';

        $object->$action();
    }
}

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('','Controller');
Routing::get('home','Controller');
Routing::get('register','Controller');
Routing::post('login','Controller');

Routing::run($path);