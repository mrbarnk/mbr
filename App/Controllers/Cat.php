<?php

/**
 *
 */
 use Illuminate\Http\Request;
class Cat extends Controller
{
  public function __construct()
  {
    $this->middleware('Authentication');
  }
  public function store() {
    // code...
    $request = new Request;
    $request = $request::capture();

  //print_r($request->all());
    $val = $this->validate($request->all(), [
      'title' =>  'required'
    ]);

    if(is_array($val)) {
      flash()->set('errors', json_encode($val));
      return back();
      return false;
    }

      $title = addslashes($request->title);


      // die($req)
      $cat = Categories::create([
        'title' => $title,
        'status' => '0',
        'user_id' => session()->get('id')
      ]);

      if($posts) {
        flash()->set('success', 'Category successfully added.');
        return back();
      } else {
        flash()->set('errors', 'Unable to make category.');
        return back();
        return false;
      }
  }

  public function update()
  {
    // code...
    $request = new Request;
    $request = $request::capture();

  //print_r($request->all());
    $val = $this->validate($request->all(), [
      'title' =>  'required',
      'id' => 'required'
    ]);

    if(is_array($val)) {
      flash()->set('errors', json_encode($val));
      return back();
      return false;
    }

      $title = addslashes($request->title);


      // die($req)
      $cat = Categories::where('id', $request->id)->update([
        'title' => $title,
        'status' => '0',
        'user_id' => session()->get('id')
      ]);

      if($cat) {
        flash()->set('success', 'Category successfully updated.');
        return back();
      } else {
        flash()->set('errors', 'Unable to update category.');
        return back();
        return false;
      }
  }
}
