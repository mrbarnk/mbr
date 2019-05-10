<?php

/**
 *
 */
// use Upload;
use Illuminate\Http\Request;
class Page extends Controller
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

    $val = $this->validate($request->all(), [
      'title' =>  'required',
      'description' => 'required'
    ]);

    if(is_array($val)) {
      flash()->set('errors', json_encode($val));
      return back();
      return false;
    }

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

      $posts = $this->model('Pages');

      // die($req)
      $posts = $posts::create([
        'title' => $title,
        'user_id' => session()->get('id'),
        'description' => $request->description,
        'view' => '0',
        'status' => '0'
      ]);

      if($posts) {
        flash()->set('success', 'Page successfully added.');
        return back();
      } else {
        flash()->set('errors', 'Unable to make page.');
        return back();
        return false;
      }
    // $message = $request->all());

  }
  public function update()
  {
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
          // return false;
          // exit;
          }else {
              return 'Invalid file.';
          }
        }
      // }

      $val = $this->validate($request->all(), [
        'title' =>  'required',
        'description' => 'required',
        'id' => 'required'
      ]);

      if(is_array($val)) {
        flash()->set('errors', json_encode($val));
        return back();
        return false;
      }

      $title = addslashes($request->title);
      $description = addslashes($request->message);

      $posts = $this->model('Pages');

      // die($req)
      $posts = $posts::where('id', $request->id)->update([
        'title' => $title,
        'user_id' => session()->get('id'),
        'description' => $request->description,
        'view' => '0',
        'status' => '0'
      ]);

      if($posts) {
        flash()->set('success', 'Page successfully updated.');
        return back();
      } else {
        flash()->set('errors', 'Unable to update page.');
        return back();
        return false;
      }
  }
}
