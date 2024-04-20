@extends('layout.app')

@section('content')
<h1 class='font-bold text-4xl'>{{ $event->title }}</h1>

<div class='mt-4 flex gap-3'>
    <a href='{{ route('events.edit', [
        'event' => $event
    ]) }}' class='btn'>Update</a>
    <div>
        <form method='POST' action='{{route('events.destroy', [
            'event' => $event
        ]) }}'>
            @csrf
            @method('DELETE')
            <button class='btn'>Delete</button></form>
    </div>
</div>

<br />

<div class='flex gap-3'>
    @forelse ($event->tags as $tag)
    <a class='btn' href="{{route('tags.index', ['tag' => $tag])}}">{{$tag->title}}</a>
    @empty
    <div>
        <h1 class='font-bold'>It's nothing here, yet...</h1>
    </div>
    @endforelse
</div>

<br />

<p>{{ $event->description }}</p>

<br />

<p>Start time: {{ $event->start_time }}</p>
<p>End time: {{ $event->end_time }}</p>

<br />

<p>Created: {{ $event->created_at->diffForHumans() }}</p>
<p>Updated: {{ $event->updated_at->diffForHumans() }}</p>

<br />

<h2 class='font-bold text-2xl'>Comments</h2>
<ul class='flex flex-col gap-2 max-w-[480px]'>
    @forelse ($event->comments as $comment)
    <li class='px-4 py-2 border border-black rounded-xl text-left max-w-[480px] w-full'>
        <div class='flex justify-between'>
            <h3 class='font-bold'>{{ $comment->name }}</h3>
            <p>{{$comment->created_at->diffForHumans()}}</p>
        </div>
        <p>{{$comment->comment}}</p>
    </li>
    @empty
    <div>
        <h1 class='font-bold'>It's nothing here, yet...</h1>
    </div>
    @endforelse
</ul>
@endsection
