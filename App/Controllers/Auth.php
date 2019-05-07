<?php


/**
 *
 */
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Hash;
class Auth extends Controller
{

  public function store()
  {
    $request = new Request;
    $request = $request::capture();
    echo Hash::make($request->password);
    print_r($request->all());
  }
}
