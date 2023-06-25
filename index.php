<?php

    interface Config{
        /**
         * @return string available configuration properties as a space separated sequence
         */
        public function getConfigurationProperties(): string;
    }

    /**
     * Base config class. Can be extended by wrappers implementing Config Interface
     */
    class BaseConfig implements Config{
        protected string $app_name;
        /**
         * @param string name of the application
         */
        public function __construct($app_name){
            $this->app_name = $app_name;
        }

        public function getConfigurationProperties(): string{
            return 'app_name:'.$this->app_name;
        }
    }

    /**
     * Used to extend classes that implements interface: Config
     */
    class DbConfig implements Config{
        protected Config $wrapped_object;
        protected string $db_host;
        protected string $db_port;
        protected string $db_name;
        protected string $db_user;
        protected string $db_password;

        /**
         * @param Config $wrapped_object previous config object that will be extended by wrapping
         * @param string $db_host database host address
         * @param string $db_port database host connection port
         * @param string $db_name database name
         * @param string $db_user login used to connect with database
         * @param string $db_password password used to connect with database 
         */
        public function __construct($wrapped_object, $db_host, $db_port, $db_name, $db_user, $db_password) {
            $this->wrapped_object = $wrapped_object;
            $this->db_host = $db_host;
            $this->db_port = $db_port;
            $this->db_name = $db_name;
            $this->db_user = $db_user;
            $this->db_password = $db_password;
        }

        public function getConfigurationProperties(): string{
            return $this->wrapped_object->getConfigurationProperties()
            . ' db_host:'.$this->db_host
            . ' db_port:'.$this->db_port
            . ' db_name:'.$this->db_name
            . ' db_user:'.$this->db_user
            . ' db_password:'.$this->db_password;
        }
    }

    /**
     * Used to extend classes that implements interface: Config
     */
    class AuthConfig implements Config{
        protected Config $wrapped_object;
        protected string $auth_cookie_name;
        protected string $auth_cookie_expiration;
        protected string $auth_cookie_domain;
        protected string $auth_cookie_secure;
        protected string $auth_cookie_http_only;
        protected string $auth_cookie_samesite;
        protected string $auth_session_expiration;

        /**
         * @param Config $wrapped_object previous config object that will be extended by wrapping
         * @param string $auth_cookie_name name of the cookie used to store session ID (SID)
         * @param string $auth_cookie_expiration number of seconds for which the session cookie is valid
         * @param string $auth_cookie_domain domain for which the cookie is accessible. it will be sent only to that domain. if set to localhost that parameter will be omitted
         * @param string $auth_cookie_secure boolean that determines whether the cookie should be transmitted only via https (no http allowed), should be true for production environment!
         * @param string $auth_cookie_http_only boolean that determines whether cookie can be used by clientside code or only via http(s) communication, should be always true!
         * @param string $auth_cookie_samesite should be set to: Strict unless you have some really good reason to set different value
         * @param string $auth_session_expiration number of seconds for which the session on server side is valid
         */
        public function __construct($wrapped_object, $auth_cookie_name, $auth_cookie_expiration, $auth_cookie_domain, $auth_cookie_secure, $auth_cookie_http_only, $auth_cookie_samesite, $auth_session_expiration) {
            $this->wrapped_object = $wrapped_object;
            $this->auth_cookie_name = $auth_cookie_name;
            $this->auth_cookie_expiration = $auth_cookie_expiration;
            $this->auth_cookie_domain = $auth_cookie_domain;
            $this->auth_cookie_secure = $auth_cookie_secure;
            $this->auth_cookie_http_only = $auth_cookie_http_only;
            $this->auth_cookie_samesite = $auth_cookie_samesite;
            $this->auth_session_expiration = $auth_session_expiration;
        }

        public function getConfigurationProperties(): string{
            return $this->wrapped_object->getConfigurationProperties()
            . ' auth_cookie_name:'.$this->auth_cookie_name
            . ' auth_cookie_expiration:'.$this->auth_cookie_expiration
            . ' auth_cookie_domain:'.$this->auth_cookie_domain
            . ' auth_cookie_secure:'.$this->auth_cookie_secure
            . ' auth_cookie_http_only:'.$this->auth_cookie_http_only
            . ' auth_cookie_samesit:'.$this->auth_cookie_samesite
            . ' auth_session_expiration:'.$this->auth_session_expiration;
        }
    }

    /**
     * Used to parse the Config object into associative array of configuration properties
     */
        class ConfigParser{
        private Config $config;
        private  $config_assoc_array;
         
        /**
         * @param Config $config object implementing Config interface that will be parsed
         */
        public function __construct(Config $config){
            $this->config = $config;
            $config_array = [];
            foreach(explode(' ', $config->getConfigurationProperties()) as $config_property){
                $property_fields = explode(':',$config_property);
                $key = $property_fields[0];
                $value = $property_fields[1];
                $config_array += array($key => $value);
            }
            $this->config_assoc_array = $config_array;
        }

        /**
         * @return array Associative array of parsed configuration properties
         */
        public function getParsedConfigAssocArray(){
            return $this->config_assoc_array;
        }
    }

    class main{

        static function main(){
            $config = new AuthConfig(
                wrapped_object: new DbConfig(
                    wrapped_object: new BaseConfig(
                        app_name: 'SWIMS'),
                    db_host: 'db',
                    db_port: '5432',
                    db_name: 'devdb',
                    db_user: 'developer',
                    db_password: 'developer'),
                auth_cookie_name: 'AUTH-38fj29fs03h3',
                auth_cookie_expiration: '60',
                auth_cookie_domain: 'localhost',
                auth_cookie_secure: 'false',
                auth_cookie_http_only: 'true',
                auth_cookie_samesite: 'Strict',
                auth_session_expiration: '60');

            echo trim($_SERVER['REQUEST_URI'], '/') . ' <br>';
            echo $_SERVER['REQUEST_URI'] . ' <br>';
            echo $_SERVER['REQUEST_METHOD'];
        }
    }
    main::main();
?>