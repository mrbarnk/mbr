<?php

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {
  protected $fillable = ['title', 'slug', 'featured_image', 'user_id', 'description', 'view', 'status', 'category'];
}
