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
        <div class="w-full mt-8">
            <table class="w-3/4 mx-auto text-lg">
            @foreach($boards as $board)
                    <thead>
                        <tr>
                            <td class="w-1/5"></td>
                            <td class="w-1/5"></td>
                            <td class="w-2/5"></td>
                            <td class="w-1/5"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b mt-2">
                            <td class="w-1/5 text-center">{{$board -> id}}</td>
                            <td class="w-1/5">{{$board -> user_name}}</td>
                            <td class="w-2/5"><a href="{{route('boards.show', $board -> id)}}">{{$board -> title}}</a></td>
                            <td class="w-1/5 text-center">{{$board -> created_at -> format('Y-m-d')}}</td>
                        </tr>
                    </tbody>
            @endforeach
            </table>
        </div>
    </section>
@stop
