<?php


/**
 *
 */
 use Illuminate\Http\Request;

class Auth extends Controller
{

  public function store()
  {
    $request = new Request;
    $request = $request::capture();

    $user = $this->model('User');
    if (!isset($request->user_role)) {
        $request->user_role = '0';
    }
    $password = Hash::make($request->password);

    $val = $this->validate($request->all(), [
      'username' => 'required',
      'password' => 'required',
      'email' => 'required|email'
    ]);

    if(is_array($val)) {
      flash()->set('errors', json_encode($val));
      // print_r(session()->get('error'));
      return back();//->with('error', 'Hii');
      // print_r($val);
      // foreach($val as $kk => $valls) {
      //   echo $valls.'\n';
      // }
      return false;
    }

    try {
      $user = $user->create([
        'username' => addslashes($request->username),
        'password_' => $password,
        'status' => '0',
        'user_role' => $request->user_role,
        'email' => $request->email
      ]);
      session()->put('id',$user->id);
      session()->put('email',$user->email);
      session()->put('username',$user->username);
    }

    catch (\Exception $e) {
      if($e->errorInfo[1] == '1062') {
        flash()->put('error', 'Duplicate users data found!');
        return back()->with('error', 'Hii');
      }
      // print_r($user->getStatusCode());
    }
    flash()->put('success', 'Account successfully created!');
    return redirect('admin');
  }

  public function login()
  {
    $request = new Request;
    $request = $request::capture();

    $user = $this->model('User');
    if (!isset($request->user_role)) {
        $request->user_role = '0';
    }

    $val = $this->validate($request->all(), [
      'username' => 'required',
      'password' => 'required'
    ]);

    if(is_array($val)) {
      flash()->set('errors', json_encode($val));
      return back();
      return false;
    }

    $users = User::where('username', $request->username);
    if ($users->count() < 1) {
      flash()->put('error', 'No user account with that username exists.');
      return back();
    }
    foreach ($users->get() as $keyVal) {
      $password = $keyVal->password_;
      $id = $keyVal->id;
      $email = $keyVal->email;
      $username = $keyVal->username;
    }
    $password = Hash::check($request->password, $password);
    if (!$password) {
      flash()->put('error', 'Password not correct!');
      return back();
    }else {
      session()->put('id',$keyVal->id);
      session()->put('email',$keyVal->email);
      session()->put('username',$keyVal->username);
        // flash()->put('success', 'L')
      return redirect('admin');
    }


  }
}
