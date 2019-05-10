<?php


class Home extends Controller {

    public function index($name = '') {

        $post = $this->model('Posts');
        $posts = $post::all();
        // print_r($posts);
        $this->view('home/index', ['posts' => $posts]);
    }
    public function p($params = '')
    {
      $pst = Posts::where('slug', $params);
      if($pst->count() < 0) {
        $this->errorPage();
      }else {
        // echo "string";
        $post = $pst->first();
        $pst->update([
          'view' => $post->view + 1
        ]);
        $this->view('read', $post);
      }
    }
    public function pages($params='')
    {
      $pages = Pages::where('title', str_replace('-', ' ', $params));

      if ($pages->count() > 0) {
        $this->view('pages', $pages->first());
      }else {
          $this->errorPage();
      }
    }

}
