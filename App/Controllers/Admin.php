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
    $this->view('admin/newpost',['cats' => $data]);
  }

  public function editpost($params = '')
  {
        $data = Categories::all();
        $param = Posts::find($params);

        if (($params != '')) {
          if (!$param) {
            $this->errorPage();
          }
        }
        // print_r($param);
        $this->view('admin/newpost', ['cats' => $data, 'post_edit' => $param] );
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
      $param = Menus::find($params);

      if ($param) {
        Menus::where('id', $params)->delete($params);
          flash()->set('error', 'Menu has been deleted.');
          return redirect('admin/menus');//-
          exit;
      }
      $this->errorPage();
  }
  public function newpage($params='')
  {
    $data = Pages::all();
    $param = Pages::find($params);

    if (($params != '')) {
      if (!$param) {
        $this->errorPage();
      }
    }
    $this->view('admin/newpage', ['pages' => $data, 'post' => $param]);
  }
  public function subscribers() {
    $data = Subscriber::all();
    $this->view('admin/subscribers', $data);
  }
  public function sendmail($params)
  {
    if (is_numeric($params)) {
      $this->view('admin/sendmail');
    }
  }
  public function sendemailtoall($params='')
  {
    if (empty($params)) {
      $this->view('admin/sendmail');
    }
    else {
      $this->errorPage();
    }

  }
}
