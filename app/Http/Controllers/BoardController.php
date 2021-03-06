<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'story' => 'required'
        ]);
        $board = new Board();
        $board -> user_id = auth() -> user() -> id;
        $board -> user_name = auth() -> user() -> name;
        $board -> title = $validation['title'];
        $board -> story = $validation['story'];

        if($request -> hasFile('picture')){
            $fileName = time().'_'.$request -> file('picture') -> getClientOriginalName();
            $path = $request -> file('picture') -> storeAs('public/images', $fileName);
            $board -> image_name = $fileName;
            $board -> image_path = $path;
        }
        $board -> save();

        return redirect('boards/'.$board -> id);
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

    public function destroy($id){
        $board = Board::where('id', $id) -> first();
        $board -> delete();

        return redirect() -> route('boards.index');
    }
}
