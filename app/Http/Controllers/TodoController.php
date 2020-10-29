<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;


class TodoController extends Controller
{
    public function index() {
        $todos = Todo::latest()->get();
        // dd($todos);
        return Inertia::render('Main', [
            'todos' => $todos,
        ]);
    }

    public function create(Request $req, $userid) {
        $user = User::findOrFail($userid);
        Todo::create(
            [
                'title' => $req->title,
                'assigned_date' => now(),
                'user_id' => $userid
            ]
        );

        return back();
    }
}
