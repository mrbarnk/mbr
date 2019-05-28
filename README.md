# Framwork
A MVC Php micro framework with.

Documentation will be ready soon, just a notice.

This template already comes with everything you need to create a blog, we are using [AdminLTE](https://github.com/ColorlibHQ/AdminLTE) template.

Which means, if you are trying to make a dashboard for your project, just clone this repo and all done.

We are using a premium text editor that will wow you.

##1
Just want to let you know that this framework is working like codeigniter, it automatically get's the controller and method.

Just like, when you want to make a admin urls e.g. `admin/posts`

You'll just have to create a class and extends to the default controller like 

``` Class Admin extends Controller {

public function posts() {
  echo "Working fine";
}
```
, or you call a view directly by saying 

``` $this->view('home/index'); ```

Now, the home is a folder while the index is the 
