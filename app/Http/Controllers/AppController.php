<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('app/index', [
            'todos' => Todo::all(),
            'action' => 'index'
        ]);
    }
}
