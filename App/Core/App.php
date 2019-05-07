<?php


class App {

    /**
     * Basic Routing - Set defaults controller, method and parameters
     * @var $controller string
     * @var $method     string
     * @var $params     array
     */
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {

        $url = $this->parseUrl();

        if (file_exists('../app/controllers/' . $url[0] . '.php')) {

            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if (isset($url[1])) {

            if (method_exists($this->controller, $url[1])) {

                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        if (isset($_POST)) {
            $this->params = $_POST;
        }elseif(isset($_FILES)) {
          $this->params = $_FILES;
        }else {
          $data = "";
        }
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Simple GET sanitize
     * @return  string  Sanitized string
     */
    public function parseUrl() {

        if (isset($_GET['url'])) {

            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}
