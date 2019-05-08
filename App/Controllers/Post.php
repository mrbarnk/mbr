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
      'message' => 'required',
      'category' => 'required|integer'
    ]);

    if(is_array($val)) {
      flash()->set('errors', json_encode($val));
      return back();
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

      $title = addslashes($request->title);
      $description = addslashes($request->message);

      $posts = $this->model('Posts');

      // die($req)
      $posts = $posts::create([
        'title' => $title,
        'featured_image' => $newname,
        'category' => $request->category,
        'user_id' => session()->get('id'),
        'description' => $request->message,
        'view' => '0',
        'status' => '0'
      ]);

      if($posts) {
        flash()->set('success', 'Post successfully added.');
        return back();
      } else {
        flash()->set('errors', 'Unable to make post.');
        return back();
        return false;
      }
    // $message = $request->all());

  }
}
