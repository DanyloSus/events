@extends('layout.app')

@section('content')
<h1>{{ $tag->title }}</h1>
@forelse ($events as $event)
<div>
    <a href='{{ route('events.show', ['event' => $event]) }}'>
        <h3>{{ $event->title }}</h3>
        <p>{{ $event->description }}</p>
    </a>
</div>
@empty
<h1>It's nothing here, yet...</h1>
@endforelse

@if ($events->count())
<nav class='mx-10 mt-10'>
    {{ $events->links() }}
</nav>
@endif
@endsection
