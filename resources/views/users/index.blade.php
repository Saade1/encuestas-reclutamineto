@extends('layouts.plantilla')

@section('title', 'usuarios')

@section('content')

    <h1>Responde las esncuestas</h1>

    <form action="{{ route('responder.store') }}" method="POST">
        @csrf
        <label>Nombre:
            <br>
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <br>
        <label>correo:
            <br>
            <input type="text" name="email" value="{{ old('email') }}">
        </label>
        <br>
        <button type="submit">enviar cuestionario</button>
    </form>
    @if (session('info'))
        <script>
            alert("{{ session('info') }}");
        </script>
    @endif
@endsection
