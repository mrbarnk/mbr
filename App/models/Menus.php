<?php


/**
 *
 */
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
  protected $table = 'menus';
  protected $fillable = ['title', 'url', 'parent_id', 'status', 'user_id'];
}
