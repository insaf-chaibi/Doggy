@extends('layouts.app')

@section('content')
<h1>Dog Disease Chatbot</h1>

    <form method="POST" action="/chatbot">
        @csrf
        <label for="symptoms">Enter your dog's symptoms:</label>
        <input type="text" id="symptoms" name="symptoms" value="{{ $symptoms }}">
        <button type="submit">Get diagnosis</button>
    </form>

    @if ($output)
        <h2>Bot:</h2>
        <p>{{ $output }}</p>
    @endif
@endsection
