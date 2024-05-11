@extends('layouts.main')

@section('content')
<form method="POST" action="{{ route('store') }}">
    @csrf
    <div class="mb-4">
        <div class="label">
            <span class="label-text text-2xl">Enter URL:</span>
        </div>
        <input type="text" placeholder="Enter url here" class="input input-bordered text-2xl input-secondary w-full mb-2" name="url" value="{{ old('url') }}" />
        @error('url')
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ $message }}</span>
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-outline btn-primary w-full text-xl">Make Short</button>
</form>
@endsection