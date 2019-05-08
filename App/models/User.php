<?php

use Illuminate\Database\Eloquent\Model;
class User extends Model{

protected $fillable = ['username', 'password_', 'status', 'user_role', 'email'];


}
