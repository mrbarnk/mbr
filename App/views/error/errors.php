<?php
// print_r($_SESSION);

// print_r(session()->get('error'));

if (flash()->has('error')) {
  echo  '<p class="alert alert-danger">'.flash()->get('error').'</p>';
}elseif (flash()->has('success')) {
  echo  '<p class="alert alert-success">'.flash()->get('success').'</p>';
}elseif (flash()->has('errors')) {
  foreach (json_decode(flash()->get('errors')) as $errors => $error) {
      echo '<p class="alert alert-danger">'.$error.'</p>';
  }
}
