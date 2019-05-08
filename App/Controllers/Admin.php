<?php


/**
 * @author MBR
 */

use Illuminate\Http\Request;

class Admin extends Controller
{
  public function __construct()
  {
    $this->middleware('Authentication');
  }
  public function index() {
    // echo "ss";
    $data = Posts::all();
    $this->view('admin/index', $data);
    // print_r(User::find(1));
  }

  public function newpost()
  {

    $data = Categories::all();
    $this->view('admin/newpost',$data);
  }

  public function register() {
    $this->view('admin/register');
  }
  public function logout()
  {
    session()->destroy();
    return redirect('admin/login');
  }

  public function categories($params = '')
  {
    $data = Categories::all();
    // $request = new Request;
    // $request = $request::capture();
    // $url = explode('/',$request->url);
    // echo end($url);
    // echo ($params);
    $param = Categories::find($params);

    if (($params != '')) {
      if (!$param) {
        $this->errorPage();
      }
    }
    $this->view('admin/categories', ['categories' => $data, 'cat' => $param]);
  }
  public function menus ($params = '') {
    $data = Menus::all();
    // $request = new Request;
    // $request = $request::capture();
    // $url = explode('/',$request->url);
    // echo end($url);
    // echo ($params);
    $param = Menus::find($params);

    if (($params != '')) {
      if (!$param) {
        $this->errorPage();
      }
    }
    $this->view('admin/menus', ['menus' => $data, 'menu' => $param]);
      // $this->view('admin/menus');
  }

  public function deletemenu($params = '')
  {
    echo $params;
  }
}
