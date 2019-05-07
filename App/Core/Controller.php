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

        return exit('Middleware doesn\'t exist');
    }

    /**
     * Basic view loader
     * @param   string $view    View file
     * @param   array $data     Array data
     */
    protected function view($view, $data = []) {

        if (file_exists('../app/views/' . $view . '.php')) {

            require_once '../app/views/' . $view . '.php';
        }
    }

    public function validate($data, $rules)
    {
      $errors = [];
      if (is_array($rules)) {
        foreach ($rules as $keys => $values) {
          if($values == 'required') {
            if (empty($data[$keys])) {
                array_push($errors ,ucfirst($keys). ' is required.');
              }
          }
          if($values == 'integer') {
            if (!is_numeric($keys)) {
                array_push($errors ,ucfirst($keys). ' is not an integer.');
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
