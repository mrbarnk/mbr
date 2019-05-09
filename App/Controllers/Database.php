<?php

/**
 *
 */
 use Illuminate\Database\Capsule\Manager as Capsule;
class Database extends Controller
{

  public function __construct()
  {
    $this->middleware('Authentication');
  }

  public function index() {
    // $this->down();

    Capsule::schema()->table('posts', function ($table) {
        $table->string('slug')->unique()->before('title');
      });
    return $this->up();
  }
  public function up()
  {
    // Capsule::dropIfExists('users');
    // Capsule::schema()->create('users', function ($table) {
    //     $table->increments('id')->index();
    //     $table->string('username');
    //     $table->string('password_');
    //     $table->string('status');
    //     $table->string('user_role');
    //     $table->string('email')->unique();
    //     $table->timestamps();
    // });
    // // Capsule::dropIfExists('posts');
    // Capsule::schema()->create('posts', function ($table) {
    //     $table->increments('id');
    //     $table->string('title');
    //     $table->string('slug')->unique();
    //     $table->text('description');
    //     $table->string('cat_id');
    //     $table->string('user_id');
    //     $table->string('featured_image');
    //     $table->string('view');
    //     $table->integer('status');
    //     // $table->
    //     $table->timestamps();
    // });
    //
    // Capsule::schema()->create('categories', function ($table)
    // {
    //   $table->increments('id');
    //   $table->string('title')->unique();
    //   $table->string('status');
    //   $table->string('user_id');
    //   $table->timestamps();
    // });
    //
    // Capsule::schema()->create('menus', function ($table)
    // {
    //   $table->increments('id');
    //   $table->string('title')->unique();
    //   $table->string('status');
    //   $table->string('type');
    //   $table->string('parent_id')->nullable();
    //   $table->string('url');
    //   $table->string('user_id');
    //   $table->timestamps();
    // });

    // Capsule::dropIfExists('posts');
    // Capsule::schema()->create('pages', function ($table) {
    //     $table->increments('id');
    //     $table->string('title');
    //     $table->text('description');
    //     $table->string('user_id');
    //     $table->string('view');
    //     $table->integer('status');
    //     // $table->
    //     $table->timestamps();
    // });

  }

  public function down() {
    // Capsule::schema()->drop('users');
    // Capsule::schema()->drop('categories');
    // Capsule::schema()->drop('posts');
    // Schema::drop('flights');
  }
}
