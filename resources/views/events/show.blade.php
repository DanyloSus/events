@extends('layout.app')

@section('content')
<h1>{{ $event->title }}</h1>
<br />
<div class='flex gap-3'>
    @forelse ($event->tags as $tag)
    <a href="{{route('tags.index', ['tag' => $tag])}}">{{$tag->title}}</a>
    @empty
    <h1>It's nothing here, yet...</h1>
    @endforelse
</div>
<br />
<ul>
    @forelse ($event->comments as $comment)
    <li>
        <h3>{{ $comment->name }}</h3>
        <p>{{$comment->comment}}</p>
    </li>
    @empty
    <h1>It's nothing here, yet...</h1>
    @endforelse
</ul>
@endsection
