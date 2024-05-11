@extends('layouts.main')

@section('content')
<div>
    <div class="flex max-w-2xl px-6 lg:max-w-7xl justify-center flex-col">
        <p class="text-center text-xl font-bold mb-1">Here is your short URL:</p>
        <h1 class="text-center text-2xl mb-4">
            <a href="{{ $shortUrl }}" class="link link-success">{{ $shortUrl  }}</a>
        </h1>
        <button type="button" class="btn btn-outline btn-primary">
            <a href="{{ route('create') }}" class="text-xl">Shorten another URL</a>
        </button>
    </div>
</div>
@endsection