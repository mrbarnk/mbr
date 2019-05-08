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

        if (file_exists('../app/models/' . $model . '.php')) {

            require_once '../app/models/' . $model . '.php';
            return new $model;
        }

        return exit('Model doesn\'t exist');
    }

    public function middleware($middleware)
    {
        if (file_exists('../app/middleware/' . $middleware . '.php')) {

            require_once '../app/middleware/' . $middleware . '.php';
            return new $middleware;
        }

        return exit('Middleware '.$middleware.' doesn\'t exist');
    }

    /**
     * Basic view loader
     * @param   string $view    View file
     * @param   array $data     Array data
     */
    protected function view($view, $data = []) {

        if (file_exists('../app/views/' . $view . '.php')) {

            require_once '../app/views/' . $view . '.php';
            exit;
        }
        die("View ".$view. " not found.");
    }

    /**
     * Basic 404 loader
     * @param   string $view    404 file
     * @param   array $data     Array data
     */
    public function errorPage() {
        $view = '404';
        if (file_exists('../app/views/' . $view . '.php')) {

            require_once '../app/views/' . $view . '.php';
            exit;
        }
        die("View ".$view. " not found.");
    }

    public function validate($data, $rules)
    {
      $errors = [];
      $saveOldInput = [];
      if (is_array($rules)) {
        foreach ($rules as $keys => $values) {
        saveOldInput($keys, $data[$keys]);
          $values = explode('|', $values);
          if(in_array('required',$values)) {
            if (empty($data[$keys])) {
                array_push($errors ,ucfirst($keys). ' is required.');
                unset($data[$keys]);
              }
          }
          if(in_array('integer',$values)) {
            if (!is_numeric($data[$keys])) {
                array_push($errors ,ucfirst($keys). ' is not an integer.');
                unset($data[$keys]);
              }
          }
          if (in_array('email',$values)) {
            if (!filter_var($data[$keys], FILTER_VALIDATE_EMAIL)) {
                  array_push($errors ,ucfirst($keys). ' is not valid email address');
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
      return $errors;
    }

}
