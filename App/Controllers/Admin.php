<?php


/**
 * @author MBR
 */
class Admin extends Controller
{

  public function index() {
    // echo "ss";
    $this->view('admin/index');
    // print_r(User::find(1));
  }

  public function login() {
    $this->view('admin/login');
  }
}
