<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListTodo extends Model
{
    use HasFactory;

    protected $table = 'lists';
    protected $fillable = ['todo_id', 'user_id'];
}
