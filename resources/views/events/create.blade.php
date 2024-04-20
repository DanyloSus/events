@extends('layout.app')

@section('content')
<h1 class='font-bold text-4xl'>Create new event</h1>

<form method='POST' action='{{route('events.store')}}' class='flex flex-col gap-3 my-4'>
    @csrf
    <div>
        <label for='title'>Title</label>
        <input id='title' name='title' value='{{ old('title') }}' />
        @error('title')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for='description'>Description</label>
        <textarea id='description' name='description'>{{ old('description') }}</textarea>
        @error('description')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for='start_time'>Start at</label>
        <input id='start_time' type='date' name='start_time' value='{{ old('start_time') }}' />
        @error('start_time')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for='end_time'>End at</label>
        <input id='end_time' type='date' name='end_time' value='{{ old('end_time') }}' />
        @error('end_time')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <button type='submit'>Submit</button>
</form>
@endsection
