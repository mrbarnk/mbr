<?php

/**
 * Controller class
 */

class Controller {

    /**
     * Basic model loader
     * @param   string $model   Model class
     * @return  mix             Class instance or error if model doesn't exist
     */
    protected function model($model) {

        if (file_exists(__DIR__.'/../models/' . $model . '.php')) {

            require_once __DIR__.'/../models/' . $model . '.php';
            return new $model;
        }

        return exit('Model doesn\'t exist');
    }

    /**
     * Basic middleware loader
     * @param   string $middleware   Middleware class
     * @return  mix             Class instance or error if middleware doesn't exist
     */
    public function middleware($middleware)
    {
        if (file_exists(__DIR__.'/../middleware/' . $middleware . '.php')) {

            require_once __DIR__.'/../middleware/' . $middleware . '.php';
            return new $middleware;
        }

        return exit('Middleware '.$middleware.' doesn\'t exist');
    }

    /**
     * Basic mail sender loader
     * @param   array $data   SendMail method
     */
    public function SendsMail(array $data)
    {
      if (array_key_exists('to_email', $data) && array_key_exists('message', $data)) {
        $to = $data['to_email'];
        if(isset($data['title'])) {
            $subject = $data['title']." => ".config('app.name');
        }else {
            $subject = "New Email From ".config('app.name');
        }
        $txt = $data['message'];
        $headers = "From: ".config('app.email') . "\r\n" .
        "CC: ".$data['to_email'];

        return mail($to,$subject,$txt,$headers);
      }
    }

    /**
     * Basic view loader
     * @param   string $view    View file
     * @param   array $data     Array data
     */
    public function view($view, $data = []) {

        if (file_exists(__DIR__.'/../views/' . $view . '.php')) {

            require_once __DIR__.'/../views/' . $view . '.php';
            // exit;
            return false;
        }
        die("View ".$view. " not found.");
    }

    /**
     * Basic 404 loader
     * @param   string $view    404 file
     * @param   array $data     Array data
     */
    public function errorPage() {
      header("HTTP/1.0 404 Not Found");
        $view = '404';
        if (file_exists(__DIR__.'/../views/' . $view . '.php')) {

            require_once __DIR__.'/../views/' . $view . '.php';
            exit;
        }
        die("View ".$view. " not found.");
    }

    /**
     * Basic default index loader
     * @param   string $view    default index file
     * @param   array $data     Array data
     */
    public function defaultIndex($controller = 'Home', $data = [] || '') {
        // $view = 'index';
        if (file_exists('../controllers/' . $controller . '.php')) {
          require_once '../controllers/' . $controller . '.php';

          $controller = new $controller;

          if (method_exists($controller, 'index')) {
            $controller->index();
          }
        }else {
          $this->errorPage();
        }
        // die("View ".$view. " not found.");
    }

    public function validate($data, $rules)
    {
      $errors = [];
      $saveOldInput = [];
      if (is_array($rules)) {
        foreach ($rules as $keys => $values) {
        
        // if(in_array($keys, $data)) {
          saveOldInput($keys, $data[$keys]);
        // }
          $values = explode('|', $values);
          if(in_array('required',$values)) {
            if (empty($data[$keys])) {
                array_push($errors ,ucfirst(str_replace('_', ' ', $keys)). ' is required.');
                unset($data[$keys]);
              }
          }
          if(in_array('integer',$values)) {
            if (!is_numeric(str_replace(' ', '', $data[$keys]))) {
                array_push($errors ,ucfirst(str_replace('_', ' ', $keys)). ' is not an integer.');
                unset($data[$keys]);
              }
          }
          if (in_array('email',$values)) {
            if (!filter_var($data[$keys], FILTER_VALIDATE_EMAIL)) {
                  array_push($errors ,ucfirst(str_replace('_', ' ', $keys)). ' is not valid email address');
                  unset($data[$keys]);
              }
          }
          // return $key;
        }
      }
      // foreach ($data as $key) {
      //   if (!empty($key)) {
      //     array_push($errors ,$key. ' is empty.');
      //   }
      // }
      if(empty($errors)) {
        return '';
      }
      if(is_array($errors)) {
      flash()->set('errors', json_encode($errors));
      // print_r(session()->get('error'));
      return back();//->with('error', 'Hii');
      // print_r($val);
      // foreach($val as $kk => $valls) {
      //   echo $valls.'\n';
      // }
    //   return false;
    }
      return $errors;
    }

}
