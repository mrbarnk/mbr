<?php


/**
 *
 */
use Illuminate\Http\Request;

class Subscribers extends Controller
{
  public function store()
  {
    $request = Request::capture();

    if (empty($request->email)) {
      echo 'Email should be added.';
      exit;
    }
    elseif(!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
      echo 'Email is not a valid email.';
      exit;
    }
    else {
      $sub = Subscriber::where('email', $request->email);

      if ($sub->count() < 1) {
        if (Subscriber::create([
            'email' => $request->email
          ])) {
            echo 'Successfully subscribed.';
            exit;
        }else {
          echo 'Something went wrong.';
          exit;
        }
      }
        echo 'Successfully subscribed.';
        exit;
    }
  }
  public function sendmail($value='')
  {
    $request = Request::capture();

    $val = $this->validate($request->all(), [
      'message' => 'required',
      'email' => 'email'
    ]);

    if (is_array($val)) {
        flash()->put('errors', json_encode($val));
        return back();
    }


    if($this->SendsMail([
      'to_email' => $request->email,
      'message' => $request->message
    ])) {
      flash()->put('success', 'Email sent.');
      return back();
    }
    else {
        flash()->put('error', 'Email error sending, contact developer.');
        return back();
    }
  }
}
