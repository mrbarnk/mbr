# Framwork
A MVC Php micro framework with.

Documentation will be ready soon, just a notice.

This template already comes with everything you need to create a blog, we are using [AdminLTE](https://github.com/ColorlibHQ/AdminLTE) template.

Which means, if you are trying to make a dashboard for your project, just clone this repo and all done.

We are using a premium text editor that will wow you.

##1 Controllers

Just want to let you know that this framework is working like codeigniter, it automatically get's the controller and method.

Just like, when you want to make a admin urls e.g. `admin/posts`

You'll just have to create a class and extends to the default controller like 

``` 
<?php 

Class Admin extends Controller {

public function posts() {
  echo "Working fine";
}
```
##2 Views

, or you call a view directly by saying 

``` $this->view('home/index'); ```

Now, the home is a folder while the index is the actual `index.php` file name.

  ```don't use the extension when calling the view method.```

##3 Models 

We are using [Laravel Eloquent](https://github.com/illuminate/database) to controller the database and the user models.

So you can easily use the Model like 
```
echo User::find(1);

```
That's after creating the Model users in the Model folder.

```

<?php

use Illuminate\Database\Eloquent\Model;

class User extends Model {
// Not really neccesary you put this, only if you want to insert into the database the secured way.
  protected $fillable = ['username', 'email'];

}
```
##4 Database 

Database has been set at the `App/db.php`.

##5 Middleware

Just like [laravel](https://github.com/laravel/laravel), you can also use middleware here 

Create your middleware at the middleware folder. Please refer to the laravel documentations if you know nothing about middleware and eloquents.

##6 Validation

We also have validations just like laravel here.

Just call it like.
```
use Illuminate\Http\Request;

$request = Request::capture();

$this->validate($request->all(), [
  'username' => 'required',
  'email' => 'email',
  'number' => 'integer'
]);

```

You can also validate in ajax by calling `validateToJson` instead of `validate`.

Please, check this file very well to see more examples i've done there.

##7 Sessions

```
session()->get('id');
session()->put('name', 'mrbarnk');
```

##8 Get old inputs

```

old('title')

```

Others helper functions

```
url()

title()
```
please refer to `Apps/helpers.php`
