<?php

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Categories extends Model
{

  protected $fillable = ['title', 'status', 'user_id'];
}
