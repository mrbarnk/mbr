<?php


class App {

    /**
     * Basic Routing - Set defaults controller, method and parameters
     * @var $controller string
     * @var $method     string
     * @var $params     array
     */
    protected $controller = 'Controller';
    protected $method = 'errorPage';
    protected $params = [];

    public function __construct() {

        $url = $this->parseUrl();

        if (file_exists('../app/controllers/' . $url[0] . '.php')) {

            $this->controller = $url[0];
            unset($url[0]);
            require_once '../app/controllers/' . $this->controller . '.php';
        }else {
          require_once '../app/core/' . $this->controller . '.php';
        }


        $this->controller = new $this->controller;

        if (isset($url[1])) {

            if (method_exists($this->controller, $url[1])) {

                $this->method = $url[1];
                unset($url[1]);
            }
        } else {
          if (method_exists($this->controller, 'index')) {

              $this->method = 'index';
              unset($url[1]);
          }else {
            $this->method = 'defaultIndex';
          }
        }

        $this->params = $url ? array_values($url) : [];
        // print_r ($this->params);

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
