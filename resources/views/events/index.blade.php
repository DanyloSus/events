<ul>
    @forelse ($events as $event)
    <li>{{$event->title}}</li>
    @empty
    <div>
        <h1>It's nothing here, yet...</h1>
    </div>
    @endforelse
</ul>

@if ($events->count())
<nav>{{ $events->links() }}</nav>
@endif
