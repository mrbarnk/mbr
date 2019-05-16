<?php


class App {

    /**
     * Basic Routing - Set defaults controller, method and parameters
     * @var $controller string
     * @var $method     string
     * @var $params     array
     */
    protected $controller = 'Home';
    protected $method = 'errorPage';
    protected $params = [];

    public function __construct() {

        $url = $this->parseUrl();


        $url[0] = ucfirst($url[0]);
        if (file_exists( __DIR__.'/../Controllers/' . $url[0] . '.php')) {
            
            $this->controller = ($url[0]);
            unset($url[0]);
            require_once __DIR__.'/../Controllers/' . $this->controller . '.php';
        }else {
          require_once  __DIR__.'/../Controllers/' . $this->controller . '.php';
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
        if (is_array($url) && array_key_exists('0', $url) && method_exists($this->controller, $url[0])) {

            $this->method = $url[0];
            unset($url[0]);
        }
        // echo $this->controller;
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
