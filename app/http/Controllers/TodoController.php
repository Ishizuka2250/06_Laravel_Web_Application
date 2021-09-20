<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;

class TodoController extends Controller
{
    public function index(Request $request) {
        $items = Todolist::all();
        return view('index', ['items' => $items]);
    }
    public function create(Request $request) {
        $this->validate($request, Todolist::$rules);
        Todolist::create($request->all());
        return redirect('/');
    }
    public function update(Request $request) {
        $this->validate($request, Todolist::$rules);
        Todolist::find($request->id)
            ->fill(['content' => $request->content])
            ->save();
        return redirect('/');
    }

    public function delete(Request $request) {
        Todolist::destroy($request->id);
        return redirect('/');
    }
}
