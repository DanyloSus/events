@extends('layout.app')

@section('content')
<h1 class='font-bold text-4xl'>{{ $tag->title }}</h1>

<div class='my-4 flex-col flex gap-3'>
    @forelse ($events as $event)
    <div class='px-4 py-2 border border-black rounded-xl text-left max-w-[480px] w-full'>
        <a href='{{ route('events.show', ['event' => $event]) }}'>
            <h3 class='font-bold'>{{ $event->title }}</h3>
            <p>{{ $event->description }}</p>
        </a>
    </div>
    @empty
    <h1>It's nothing here, yet...</h1>
    @endforelse
</div>

@if ($events->count())
{{ $events->links() }}
@endif
@endsection
