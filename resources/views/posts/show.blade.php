@extends('layouts.app')

@section('title', $post['title'])

@section('content')
@if($post['is_new'])
<div>
  A new blog post! Using if
</div>
@else
<div>
  Blog Post may be old! using elseif/else
</div>

@endif
@unless ($post['is_new'])
<div>
  it is an old posts... using unless
</div>
@endunless

<h1>{{ $post['title'] }}</h1>
<p>{{ $post['content'] }}</p>

@isset($post['has_comments'])

<div>the posts has some comments</div>
  
@endisset


@endsection
