<?php

/**
 *
 */
// use Upload;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\Translation\Translator;
class Post extends Controller
{

  public function __construct()
  {
    $this->middleware('Auth');
  }
  public function store()
  {
    // code...
    $request = new Request;
    $request = $request::capture();
    // $Validator = new Validator;
      require_once __DIR__.'/../views/lang/en.php';
     define('RULES', rules());
     $RULES = rules();
  //print_r($request->all());
    $val = $this->validate($request->all(), [
      'title' =>  'required',
      'message' => 'required'
    ]);

    if(is_array($val)) {
      // print_r($val);
      foreach($val as $kk => $valls) {
        echo $valls.'\n';
      }
      return false;
    }

    // if($val->fails()) {
    //   foreach ($val->messages() as $keyvalue) {
    //     echo $keyvalue;
    //   }
    // }
    // return Illuminate\Support\Facades\Redirect::redirect()->with('Hello', 'Hi');

    $image = $request->file('file');
    if($image) {
    $imageName = $image->getClientOriginalName();

    // if($request->wantsJson()) {

      // $image->move(url('postimages'), $image);

      $ext = explode('.', $imageName);
      $ext = strtolower(end($ext));
      $allowed = array('jpg', 'png', 'jpeg', 'gif');
      if(in_array($ext, $allowed)) {
          $newname = uniqid('', true).'.'.$ext;
          $moved = ($image->move('postimages', $newname));
          $array = ['link' => url('postimages/'.$newname)];
          echo json_encode((object) $array);
          // return false;
          // exit;
          }else {
              return 'Invalid file.';
          }
        }
      // }

      $title = $request->title;
      $description = $request->message;

      $posts = $this->model('Posts');

      // die($req)
      $posts = $posts::create([
        'title' => $title,
        'featured_image' => $newname,
        'user_id' => session()->get('id'),
        'description' => $request->message,
        'view' => '0',
        'status' => '0'
      ]);

      if($posts) {
        return back();
      } else {
        echo 'Error';//->with('back')
      }
    // $message = $request->all());

  }
}
