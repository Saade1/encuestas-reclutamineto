@extends('layouts.plantilla')

@section('title', 'Editar encuesta')

@section('content')

    <h1>Editar encuestas</h1>

    <form action="{{ route('survey.update',$survey)}}" method="POST">
        @csrf
        @method('put')
        <label>
            Tipo de pregunta:
            <select name="question_type" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="open" <?php if ($survey->question_type === 'open') {
                    echo 'selected';
                } ?>>Abierta</option>
                <option value="multiple_choice" <?php if ($survey->question_type === 'multiple_choice') {
                    echo 'selected';
                } ?>>Opción múltiple</option>
                <option value="list" <?php if ($survey->question_type === 'list') {
                    echo 'selected';
                } ?>>Lista</option>
                <option value="combined" <?php if ($survey->question_type === 'combined') {
                    echo 'selected';
                } ?>>Combinada</option>
            </select>
        </label>
        <label>
            Tipo de encuesta:
            <select name="survey_type" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="anonymous"<?php if ($survey->survey_type === 'anonymous') {
                    echo 'selected';
                } ?>>Anónimo</option>
                <option value="public"<?php if ($survey->survey_type === 'public') {
                    echo 'selected';
                } ?>>Público</option>
            </select>
        </label>
        <label>
            Fecha de creación:
            <input type="datetime-local" name="created_at" value="<?= $survey['created_at'] ?>">
        </label>
        <label>
            Fecha de modificaion:
            <input type="datetime-local" name="updated_at" value="<?= $survey['updated_at'] ?>">
        </label>
        <label>
            Fecha de vigencia:
            <input type="datetime-local" name="effective_date" value="<?= $survey['effective_date'] ?>">
        </label>
        <label>
            Título:
            <input type="text" name="title" value="{{ $survey->title }}">
        </label>
        <br>
        <label>
            Indicaciones:
            <textarea name="indications" rows="5">{{ $survey->indications }}</textarea>
        </label>

        <br>
        <button type="submit">Actualizar formulario</button>
    </form>

@endsection
