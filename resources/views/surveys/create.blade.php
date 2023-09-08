@extends('layouts.plantilla')

@section('title', 'Crear encuesta')

@section('content')
    <a href="{{ route('survey.index') }}">Regresar a encuestas</a>
    <h1>Crear encuestas</h1>
    <form action="{{ route('survey.surveys') }}" method="POST">
        @csrf
        <label>
            Tipo de pregunta:
            <select name="question_type" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="open" {{ old('question_type') == 'open' ? 'selected' : '' }}>Abierta</option>
                <option value="multiple_choice" {{ old('question_type') == 'multiple_choice' ? 'selected' : '' }}>Opción
                    múltiple</option>
                <option value="list" {{ old('question_type') == 'list' ? 'selected' : '' }}>Lista</option>
                <option value="combined" {{ old('question_type') == 'combined' ? 'selected' : '' }}>Combinada</option>
            </select>
        </label>
        @error('question_type')
            <br>
            <small>{{ $message }}</small>
            <br>
        @enderror
        <label>
            Tipo de encuesta:
            <select name="survey_type" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="anonymous"{{ old('survey_type') == 'anonymous' ? 'selected' : '' }}>Anónimo</option>
                <option value="public"{{ old('survey_type') == 'public' ? 'selected' : '' }}>publico</option>
            </select>
        </label>
        @error('survey_type')
            <br>
            <small>{{ $message }}</small>
            <br>
        @enderror
        <label>
            Fecha de creación:
            <input type="datetime-local" name="created_at" value="{{ old('created_at') }}">
            <br>
        </label>
        Fecha de modificaion:
        <input type="datetime-local" name="updated_at" value="{{ old('updated_at') }}">
        </label>
        <label>
            Fecha de vigencia:
            <input type="datetime-local" name="effective_date" value="{{ old('effective_date') }}">
        </label>
        @error('effective_date')
            <br>
            <small>{{ $message }}</small>
            <br>
        @enderror
        <label>
            Título:
            <input type="text" name="title" value="{{ old('title') }}">
        </label>
        @error('title')
            <br>
            <small>{{ $message }}</small>
            <br>
        @enderror
        <br>
        <label>
            Indicaciones:
            <textarea name="indications" rows="5">{{ old('indications') }}</textarea>
        </label>
        @error('indications')
            <br>
            <small>{{ $message }}</small>
            <br>
        @enderror
        <br>
        <button type="submit">Guardar formulario</button>
    </form>

@endsection
