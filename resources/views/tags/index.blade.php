@extends('layout.app')

@section('content')
@forelse ($tags as $tag)
<h1><a href="{{ route('tags.show', ['tag' => $tag]) }}">{{ $tag->title }}</a></h1>
@empty
<h1>It's nothing here, yet...</h1>
@endforelse
@endsection
