<?php
/**
 *
 */
use Illuminate\Http\Request;


class Menu extends Controller
{
  public function __construct()
  {
    $this->middleware('Authentication');
  }

  public function store()
  {
    $request = Request::capture();



    $val = $this->validate($request->all(), [
      'title' =>  'required'
    ]);
    if (!isset($request->status)) {
        $request->status = '1';
    }
    if(is_array($val)) {
      flash()->set('errors', json_encode($val));
      return back();
      return false;
    }
    if (!isset($request->link_to)) {
        $request->link_to = url(str_replace(' ', '-', $request->title));
    }
    try {
      Menus::create([
        'title' => $request->title,
        'url' => $request->link_to,
        'parent_id' => $request->parent_id,
        'type' =>$request->type,
        'status' => $request->status,
        'user_id' => session()->get('id')
      ]);
    } catch (\Exception $e) {
          if($e->errorInfo[1] == '1062') {
            flash()->put('error', 'Duplicate menu title data found!');
            return back()->with('error', 'Hii');
          }
          // print_r($user->getStatusCode());
        }
        flash()->put('success', 'Menu successfully created!');
        return back();//('admin');
  }

  public function update()
  {
    $request = Request::capture();



    $val = $this->validate($request->all(), [
      'title' =>  'required',
      'id' => 'required'
    ]);
    if (!isset($request->status)) {
        $request->status = '1';
    }
    if(is_array($val)) {
      flash()->set('errors', json_encode($val));
      return back();
      return false;
    }
    if (!isset($request->link_to)) {
        $request->link_to = url(str_replace(' ', '-', $request->title));
    }

      Menus::where('id', $request->id)->update([
        'title' => $request->title,
        'url' => $request->link_to,
        'parent_id' => $request->parent_id,
        'type' =>$request->type,
        'status' => $request->status,
        'user_id' => session()->get('id')
      ]);

        flash()->put('success', 'Menu successfully updated!');
        return back();//('admin');
  }

}
