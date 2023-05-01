<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;

class TodoController extends Controller
{
    public function taskList(Request $request)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'errors' => null,
            'data' => User::find($request->user()->id)->todos
        ]);
    }

    public function view($id)
    {
        $todo = Todo::find($id);
        if (!empty($todo)) {
            return response()->json([
                'code' => 200,
                'message' => 'Success',
                'errors' => null,
                'data' => $todo
            ]);
        }

        return response()->json([
            'code' => 500,
            'message' => 'Something went wrong!',
            'errors' => 'The task cannot be found',
            'data' => []
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate(Todo::rules());
        $validated['user_id'] = $request->user()->id;
        $todo = Todo::create($validated);

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'errors' => null,
            'data' => $todo
        ]);
    }

    public function edit(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (empty($todo)) {
            return response()->json([
                'code' => 500,
                'message' => 'Something went wrong!',
                'errors' => 'The task cannot be found',
                'data' => []
            ]);
        }

        $validated = $request->validate(Todo::rules());
        $todo->update($validated);

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'errors' => null,
            'data' => $todo
        ]);
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        if (empty($todo)) {
            return response()->json([
                'code' => 500,
                'message' => 'Something went wrong!',
                'errors' => 'The task cannot be found',
                'data' => []
            ]);
        }

        $todo->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Delete task success',
            'errors' => null,
            'data' => []
        ]);
    }
}
