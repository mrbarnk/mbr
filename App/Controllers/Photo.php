<?php

/**
 *
 */
// use Upload;
use Illuminate\Http\Request;
class Photo extends Controller
{

  public function __construct()
  {
    $this->middleware('Authentication');
  }
  public function store()
  {
    // code...
    $request = new Request;
    $request = $request::capture();

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
          return false;
          // exit;
          }else {
              return 'Invalid file.';
          }
        }
      // }
      

  }
}
