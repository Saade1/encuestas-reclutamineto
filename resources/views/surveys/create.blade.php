@extends('layouts.plantilla')

@section('title', 'Crear encuesta')

@section('content')

    <h1>Crear encuestas</h1>

    <form action="{{ route('survey.surveys') }}" method="POST">
        @csrf
        <label>
            Tipo de pregunta:
            <select name="question_type" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="open">Abierta</option>
                <option value="multiple_choice">Opción múltiple</option>
                <option value="list">Lista</option>
                <option value="combined">Combinada</option>
            </select>
        </label>
        <label>
            Tipo de encuesta:
            <select name="survey_type" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="anonymous">Anónimo</option>
                <option value="public">Público</option>
            </select>
        </label>
        <label>
            Fecha de creación::
            <input type="datetime-local" name="created_at">
        </label>
        <label>
            Fecha de modificaion:
            <input type="datetime-local" name="updated_at">
        </label>
        <label>
            Fecha de vigencia:
            <input type="datetime-local" name="effective_date">
        </label>
        <label>
            Título:
            <input type="text" name="title">
        </label>
        <br>
        <label>
            Indicaciones:
            <textarea name="indications" rows="5"></textarea>
        </label>
        
        <br>
        <button type="submit">Guardar formulario</button>
    </form>

@endsection
