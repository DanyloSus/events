@extends('layout.app')

@section('content')
<h1 class='font-bold text-4xl'>Tags</h1>

<div class='my-4 flex flex-col gap-1'>
    @forelse ($tags as $tag)
    <h3><a class='hover:underline' href="{{ route('tags.show', ['tag' => $tag]) }}">{{ $tag->title }}</a></h3>
    @empty
    <div class='absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2'>
        <h1 class='font-bold text-4xl'>It's nothing here, yet...</h1>
    </div>
    @endforelse
</div>
@endsection
