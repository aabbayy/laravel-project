{{-- extend the base layout --}}
@extends('layouts.app')
{{-- create section for title --}}
@section('title', '')
{{-- create content section --}}
@section('content')
    {{-- manifest a form and use the POST method to create data --}}
    <form action="{{ route('posts.store') }}" method="POST">
        {{-- generate a csrf token MIDDLEWARE --}}
        @csrf
        {{-- create input controls --}}
        <div>
            <input type="text" name="title">
        </div>

        {{-- @error('title')
            <div>{{ $message }}</div>
        @enderror --}}

        {{-- text area for user to input content --}}
        <div>
            <textarea name="content"></textarea>
        </div>

        {{-- @error('content')
            <div>{{ $message }}</div>
        @enderror --}}

        @if ($errors->any())
            <div>

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>
        @endif

        {{-- submit button to push form content --}}


        <div>
            <input type="submit" value="Create">
        </div>
    </form>
@endsection
