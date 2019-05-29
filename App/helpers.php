<?php

use Carbon\Carbon;

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

function cookie($key = '') {
  return new Cookie();//$key);
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
    $newConfig = new Config();

  return $newConfig->base_url.$data;
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
    $newConfig = new Config();
    
  header("Location: ".$newConfig->base_url.''.$url);
}

function formatText ($text) {

// The Regular Expression filter
$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";



// Check if there is a url in the text
if(preg_match($reg_exUrl, $text, $url)) {

       // make the urls hyper links
       return preg_replace($reg_exUrl, "<a target='_blank' href='{$url[0]}'>{$url[0]}</a>", $text);

} else {

       // if no urls in the text just return the text
       return $text;

}
}

function timeAgo($datetime, $full = false) {

date_default_timezone_set('Africa/Lagos');
  // Carbon::now('Africa/Lagos');
  // $dt = Carbon::parse($datetime);
  // return $dt->diffForHumans();


    $now_timestamp = strtotime(date('Y-m-d H:i:s'));
    
    $diff_timestamp = $now_timestamp - strtotime($datetime);
   
     if($diff_timestamp >=60 && $diff_timestamp < 3600){
      return round($diff_timestamp/60).' mins ago';
     }
     elseif($diff_timestamp >=3600 && $diff_timestamp < 86400){
      return round($diff_timestamp/3600).' hours ago';
     }
     elseif($diff_timestamp >=86400 && $diff_timestamp < (86400*30)){
      return round($diff_timestamp/(86400)).' days ago';
     }
     elseif($diff_timestamp >=(86400*30) && $diff_timestamp < (86400*365)){
      return round($diff_timestamp/(86400*30)).' months ago';
     }
     else{
      return round($diff_timestamp/(86400*365)).' years ago';
     }

    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    
    return json_encode($string);
    // if ($string['s'] < 60) {
    //   $string['h'] = 
    // }

    return $string ? 'Away <i class="fa fa-circle fa-orange"></i> '.implode(', ', $string) . ' ago' : 'Online <i class="fa fa-circle fa-green"></i>';
}
