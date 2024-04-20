@extends('layout.app')

@section('content')
<ul>
    @forelse ($events as $event)
    <li><a href='{{ route('events.show', ['event' => $event]) }}'>{{$event->title}}</a></li>
    @empty
    <div>
        <h1>It's nothing here, yet...</h1>
    </div>
    @endforelse
</ul>

@if ($events->count())
<nav>{{ $events->links() }}</nav>
@endif
@endsection
