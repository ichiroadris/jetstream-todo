<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;


class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        // dd($todos);
        return Inertia::render('Main', [
            'todos' => $todos,
        ]);
    }

    public function create(Request $req, $userid) {
        $user = User::findOrFail($userid);
        // dd($user);
        Todo::create(
            [
                'title' => 'hello',
                'assigned_date' => now(),
                'user_id' => $userid
            ]
        );

        return back();
    }
}
