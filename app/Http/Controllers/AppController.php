<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppController extends Controller
{
    public function index()
    {
        return view('app/index', [
            'todos' => User::find(Auth::id())->todos,
            'action' => 'index'
        ]);
    }
}
