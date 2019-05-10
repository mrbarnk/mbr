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
function title()
{
  $title = $_SERVER['REQUEST_URI'];
  $title = explode('/', $title);
  $title = str_replace('-', ' ', $title);
  if (empty(end($title))) {
    $title = 'Fxreport';
  }
  else {
    $title = ucfirst(end($title));
  }
  return $title;
}
function ip()
{
  $cont = new Illuminate\Http\Request;
  return $cont::capture()->ip();
}
function getCountryByIp()
{
  return 'NGN';
}
function extend($value, $data = '')
{
  $cont = new Controller;
  return $cont->view($value, $data);
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

function config($data) {
  $datas = explode('.', $data);
  $parent = $datas[0];
  $child = $datas[1];
  if (count($datas) == 2) {
    $newConfig = new Config();
    return ($newConfig->$parent()->$child());
  }
}

function redirect($url) {
  header("Location: ".BASE_URL.'public/'.$url);
}
