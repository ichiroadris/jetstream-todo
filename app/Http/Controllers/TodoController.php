<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Inertia\Inertia;


class TodoController extends Controller
{
    public function index(Request $req) {
        $todos = Todo::where('user_id', auth()->user()->id)->latest()->where('title', 'like', '%' . $req->query('search') . '%')->get();
        return Inertia::render('Main', [
            'todos' => $todos,
        ]);
    }

    public function create(Request $req, $userid) {
        Todo::create(
            [
                'title' => $req->title,
                'assigned_date' => $req->assigned_date,
                'user_id' => $userid
            ]
        );

        return back();
    }

    public function toggle(Request $req) {
        $todo = Todo::find($req->id);
        $todo->update([
            'isDone' => !$req->isDone
        ]);

        return back();
    }

    public function destroy(Request $req) {
        $todo = Todo::find($req->id);
        $todo->delete();

        return back();
    }

}
