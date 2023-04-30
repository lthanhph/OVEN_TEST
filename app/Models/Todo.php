<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todos';
    protected $fillable = ['name', 'execution_time', 'user_id'];

    public static function rules()
    {
        return [
            'name' => 'required|max:255',
            'execution_time' => 'required|date',
        ];
    }

    public function getFormattedExcTime()
    {
        $excTime = strtotime($this->execution_time);
        return date('d/m/Y h:i A', $excTime);
    }
}
