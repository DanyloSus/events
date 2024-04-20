@extends('layout.app')

@section('content')
<h1 class='font-bold text-4xl'>Events</h1>

<ul class='flex flex-col gap-1 my-4'>
    @forelse ($events as $event)
    <li><a class='hover:underline' href='{{ route('events.show', ['event' => $event]) }}'>{{$event->title}}</a></li>
    @empty
    <div class='absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2'>
        <h1 class='font-bold text-4xl'>It's nothing here, yet...</h1>
    </div>
    @endforelse
</ul>

@if ($events->count())
{{ $events->links() }}
@endif
@endsection
