<?php


/**
 *
 */
class Auth extends Controller
{

  function __construct()
  {
    if (!session()->has('id')) {
        return $this->view('admin/login');
    }
  }
}
