<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(){
        return view('boards.index');
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
}
