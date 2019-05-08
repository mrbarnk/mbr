<?php



function includeFile($path) {

  $dir = __DIR__.'/';
  $path = explode('.', $path);

  $fileExists = '';
  for ($i=0; $i < count($path); $i++) {
    $fileExists .=$path[$i].'/';
  }
  $fileExists = substr($dir.'views/'.$fileExists,-0,-1).'.php';
  if (file_exists($fileExists)) {
    require_once $fileExists;
  }else {
    die("The file {{$fileExists}} does not exists.");

  }
}
function back() {
	header("Location: {$_SERVER['HTTP_REFERER']}");
	exit;
}
function session($key = '') {
  return new Session($key);
}

function flash() {
  return new Flash;
}
function old($data) {
  return flash()->get($data);
}

function saveOldInput($key, $data) {
  return flash()->put($key,$data);
}

function url($data) {
  return BASE_URL.'public/'.$data;
}

function redirect($url) {
  header("Location: ".BASE_URL.'public/'.$url);
}
