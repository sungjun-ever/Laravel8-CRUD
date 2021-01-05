<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(){
        return view('boards.index', ['boards' => Board::all() -> sortDesc()]);
    }

    public function create(){
        return view('boards.create');
    }

    public function store(Request $request){
        $validation = $request -> validate([
            'title' => 'required',
            'story' => 'required'
        ]);

        $board = new Board();
        $board -> title = $validation['title'];
        $board -> story = $validation['story'];
        $board -> save();

        return redirect() -> route('boards.index');
    }

    public function show($id){
        $board = Board::where('id', $id) -> first();
        return view('boards.show', compact('board'));
    }

    public function edit($id){
        $board = Board::where('id', $id) -> first();
        return view('boards.edit', compact('board'));
    }

    public function update(Request $request, $id){
        $validation = $request -> validate([
            'title' => 'required',
            'story' => 'required'
        ]);

        $board = Board::where('id', $id) -> first();
        $board -> title = $validation['title'];
        $board -> story = $validation['story'];
        $board -> save();

        return redirect() -> route('boards.show', $id);
    }
}
