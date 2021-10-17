<?php

namespace App\Http\Controllers;
use App\Models\Todo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json([
            'message' => 'OK!',
            'data' => $todos
        ], 200);
    }

    public function store(Request $request)
    {
        $todo = new Todo;
        $form = $request->all();
        $todo->fill($form)->save();
        $todos = Todo::all();

        return response()->json([
            'message' => 'Todo created successfully',
            'data' => $todos
        ], 201);
    }

    public function destroy($id)
    {
        Log::info("削除処理です。");
        Log::info($id);
        $todo = Todo::where('id', $id)->delete();
        $todos = Todo::all();
        if ($todo) {
            return response()->json([
                'message' => 'Todo deleted successfully',
                'data' => $todos,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Book not found',
                'data' => $todos,
            ], 404);
        }
    }
}
