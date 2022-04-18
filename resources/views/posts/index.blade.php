@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')

    @forelse($posts as $key => $post)
        {{-- see learning notes on the posts.partials.post file --}}
        @include('posts.partials.post', [])
    @empty
        No posts found!
    @endforelse
@endsection
