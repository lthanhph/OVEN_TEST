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
        $search = $request->input('search');
        $search = trim($search);
        $todos = Todo::where('name', 'like', "%$search%")
                    ->orWhere('execution_time', 'like', "%$search%")
                    ->get();
        return view('app/index', [
            'action' => 'search',
            'todos' => $todos,
        ]);
    }
}
