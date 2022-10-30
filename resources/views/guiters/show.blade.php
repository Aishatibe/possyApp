@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <h3>{{ $guiter['name'] }}</h3>
    <ul>
        <li>
            {{ $guiter['brand'] }}
        </li>
        <li>
            {{ $guiter['year_made'] }}
        </li>
    </ul>
    <a href="{{ route('guiters.edit', $guiter->id) }}">Edit</a>
    <a href="{{ route('guiters.index') }}">Back</a>
</div>
@endsection