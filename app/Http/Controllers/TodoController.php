<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate(Todo::rules());
            $validated['user_id'] = Auth::id();
            Todo::create($validated);
            return redirect('/')->with('message', 'Create task success!');
        }

        return view('app/todo', ['action' => 'create-task']);
    }

    public function edit(Request $request, $id)
    {
        $todo = Todo::find($id);
        if ($request->isMethod('post')) {
            $validated = $request->validate(Todo::rules());
            $todo->update($validated);

            return redirect('/')->with('message', 'Edit task success!');
        }

        return view('app/todo', [
            'action' => 'edit-task',
            'todo' => $todo,
        ]);
    }

    public function delete($id)
    {
        Todo::find($id)->delete();
        return redirect('/')->with('message', 'Delete task success!');
    }

    public function search(Request $request)
    {
        // $search = $request->input('search');
        // $search = trim($search);
        // $query = Todo::where('name', 'like', "%$search%");

        // $timestamp = strtotime($search);
        // if (!empty($timestamp)) {
        //     $start = date('Y-m-d 00:00:00', $timestamp);
        //     $end = date('Y-m-d 23:59:59', $timestamp);
            
        //     $query = $query->orWhere('execution_time', 'like', "%$search%");
        // };
        
        $name = $request->input('name');
        $time = $request->input('time');
        
        $query = Todo::select('*');
        if (!empty($name)) {
            $query = $query->where('name', 'like', "%$name%");
        }
        if (!empty($time)) {
            $query = $query->orWhere('execution_time', 'like', "%$time%");
        }
        $todos = $query->get();
        
        session()->flash('name', $name);
        session()->flash('time', $time);

        return view('app/search', [
            'action' => 'search',
            'todos' => $todos,
        ]);
    }
}
