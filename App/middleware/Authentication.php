<?php

// namespace Mbr\Middleware;
/**
 *
 */
class Authentication extends Controller
{

  public function __construct()
  {
    // echo "string";
    // session()->destroy();

    if (!session()->has('id')) {
      // print_r($this->parseUrl($_GET));
        $this->view('admin/login');
        // exit;
    }
  }
}
