@extends('layouts.app')

@section('section')
    <section class="w-2/3 mx-auto mt-8 ">
        <div class="flex w-full justify-between">
            <div class="flex-initial text-2xl text-green-500">게시판</div>
            <div class="flex-initial">
                <a href="{{route('boards.create')}}">
                    <button class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-700">글쓰기</button>
                </a>
            </div>
        </div>
    </section>
@stop
