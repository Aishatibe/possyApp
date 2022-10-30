@extends('layout')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        @if (count($guiters) > 0)
            @foreach ($guiters as $guiter)
                <div>
                    <h3>
                        {{ $guiter['name'] }}
                    </h3>
                    <ul>
                        <li>Made by: {{ $guiter['brand'] }}</li>
                        <li>Manufacture Date: {{ $guiter['year_made'] }}</li>
                    </ul>
                    <a href="{{ route('guiters.show', ['guiter' => $guiter['id']]) }}">View Brand</a>
                </div>
            @endforeach
        @else
            <h2>There are no guiters to display</h2>
        @endif
        <div>
            User Input: {{ $userInput }}
        </div>
        <a class="p-6" href="{{ route('guiters.create') }}">Create New</a>
    </div>
@endsection
