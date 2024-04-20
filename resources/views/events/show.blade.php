@extends('layout.app')

@section('content')
<h1 class='font-bold text-4xl'>{{ $event->title }}</h1>

<br />

<div class='flex gap-3'>
    @forelse ($event->tags as $tag)
    <a class='btn' href="{{route('tags.index', ['tag' => $tag])}}">{{$tag->title}}</a>
    @empty
    <div>
        <h1 class='font-bold text-4xl'>It's nothing here, yet...</h1>
    </div>
    @endforelse
</div>

<br />

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
        <h1 class='font-bold text-4xl'>It's nothing here, yet...</h1>
    </div>
    @endforelse
</ul>
@endsection
