@extends('layout.app')

@section('content')
<h1 class='font-bold text-4xl'>Edit {{ $event->title }}</h1>

<form method='POST' action='{{route('events.update', [
    'event' => $event
])}}' class='flex flex-col gap-3 my-4'>
    @csrf
    @method('PUT')
    <div>
        <label for='title'>Title</label>
        <input id='title' name='title' value='{{ $event->title }}' />
        @error('title')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for='description'>Description</label>
        <textarea id='description' name='description'>{{ $event->description }}</textarea>
        @error('description')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for='start_time'>Start at</label>
        <input id='start_time' type='date' name='start_time' value='{{ date_format(date_create($event->start_time), 'Y-m-d')}}' />
        @error('start_time')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for='end_time'>End at</label>
        <input id='end_time' type='date' name='end_time' value='{{ date_format(date_create($event->end_time), 'Y-m-d')}}' />
        @error('end_time')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <button type='submit'>Submit</button>
</form>
@endsection
