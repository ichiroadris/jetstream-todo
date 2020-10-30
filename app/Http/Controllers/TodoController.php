<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;


class TodoController extends Controller
{
    public function index() {
        $todos = Todo::where('user_id', auth()->user()->id)->latest()->get();
        // dd($todos);
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

    public function update(Request $req) {
        $todo = Todo::find($req->todoid);

    }

    public function destroy(Request $req) {
        $todo = Todo::find($req->todoid);
        $todo->delete();

        return back();
    }

}
