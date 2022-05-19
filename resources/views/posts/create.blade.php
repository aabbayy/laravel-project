{{-- extend the base layout --}}
@extends('layouts.app')
{{-- create seciton for title --}}
@section('title', '')
{{-- create content section --}}
@section('content')
    {{-- manifest a form and use the POST method to create data --}}
    <form action="{{ route('posts.store') }}" method="POST">
        {{-- create input controls --}}
        <div>
            <input type="text" name="title">
        </div>
        {{-- text area for user to input content --}}
        <div>
            <textarea name="content"></textarea>
        </div>
        {{-- submit button to push form content --}}
        <div>
            <input type="submit" value="Create">
        </div>
    </form>
@endsection
