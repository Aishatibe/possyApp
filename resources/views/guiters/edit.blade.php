@extends('layout')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <form class="form bg-white p-6 border-1" method='POST'
            action="{{ route('guiters.update', ['guiter' => $guiter->id]) }}">
            @csrf
            @method('PUT')
            <div>
                <label class="text-sm" for="guiter-name">Guiter Name</label>
                <input class="text-lg border-1" type="text" id="guiter-name" name="guiter-name"
                    value="{{ $guiter->name }}" />
            </div>
            @error('guiter-name')
                <div class="form-error">{{ $message }}</div>
            @enderror
            <div>
                <label class="text-sm" for="brand">Brand</label>
                <input class="text-lg border-1" type="text" id="brand" name="brand" value="{{ $guiter->brand }}" />
            </div>
            @error('brand')
                <div class="form-error">{{ $message }}</div>
            @enderror
            <div>
                <label class="text-sm" for="year">Year Made</label>
                <input class="text-lg border-1" type="text" id="year" name="year"
                    value="{{ $guiter->year_made }}" />
            </div>
            @error('year')
                <div class="form-error">{{ $message }}</div>
            @enderror
            <div>
                <button class="border-1" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
