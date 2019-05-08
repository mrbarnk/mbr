<?php

/**
 *
 */
use Illuminate\Database\Eloquent\Model;
class Pages extends Model
{
  protected $fillable = ['title', 'description', 'user_id', 'view', 'status'];
}
