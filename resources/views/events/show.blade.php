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
    <a class='btn' href="{{route('tags.show', ['tag' => $tag])}}">{{$tag->title}}</a>
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

<br />

<form method="POST" action="{{ route('events.comments.store', [
    'event' => $event
])}}" class='flex flex-col gap-3'>
    @csrf
    <div>
        <label for='name'>Name</label>
        <input id='name' name='name' value='{{ old('name') }}' />
        @error('name')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for='comment'>Comment</label>
        <textarea id='comment' name='comment'>{{ old('comment') }}</textarea>
        @error('comment')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <button type='submit'>Submit</button>
</form>

<br />

<ul class='flex flex-col gap-2 max-w-[480px]'>
    @forelse ($event->comments as $comment)
    <li class='px-4 py-2 border border-black rounded-xl text-left max-w-[480px] w-full'>
        <div class='flex justify-between items-center gap-3'>
            <h3 class='font-bold'>{{ $comment->name }}</h3>
            <div class='flex gap-1 items-center'>
                <p>{{$comment->created_at->diffForHumans()}}</p>
                <form method="POST" action='{{ route('events.comments.destroy', [
                    'event' => $event,
                    'comment' => $comment,
                ]) }}'>
                    @csrf
                    @method('DELETE')
                    <button type='submit'>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" version="1.1" id="Capa_1" width="16px" height="16px" viewBox="0 0 490.646 490.646" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M399.179,67.285l-74.794,0.033L324.356,0L166.214,0.066l0.029,67.318l-74.802,0.033l0.025,62.914h307.739L399.179,67.285z     M198.28,32.11l94.03-0.041l0.017,35.262l-94.03,0.041L198.28,32.11z" />
                                    <path d="M91.465,490.646h307.739V146.359H91.465V490.646z M317.461,193.372h16.028v250.259h-16.028V193.372L317.461,193.372z     M237.321,193.372h16.028v250.259h-16.028V193.372L237.321,193.372z M157.18,193.372h16.028v250.259H157.18V193.372z" />
                                </g>
                            </g>
                        </svg>
                    </button>
                </form>
            </div>
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
