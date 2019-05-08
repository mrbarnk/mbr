<?php

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {
  protected $fillable = ['title', 'featured_image', 'user_id', 'description', 'view', 'status', 'category'];
}
