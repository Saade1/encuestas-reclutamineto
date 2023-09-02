@extends('layouts.plantilla')

@section('title', 'Editar encuesta')

@section('content')

    <h1>Editar encuestas mk2</h1>

    <form action="{{ route('survey.update', $survey) }}" method="POST">
        @csrf
        @method('put')
        <label>
            Tipo de pregunta:
            <select name="question_type" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="open" {{ old('question_type', $survey->question_type) === 'open' ? 'selected' : '' }}>
                    Abierta</option>
                <option value="multiple_choice"
                    {{ old('question_type', $survey->question_type) === 'multiple_choice' ? 'selected' : '' }}>Opción
                    múltiple</option>
                <option value="list" {{ old('question_type', $survey->question_type) === 'list' ? 'selected' : '' }}>Lista
                </option>
                <option value="combined" {{ old('question_type', $survey->question_type) === 'combined' ? 'selected' : '' }}>
                    Combinada</option>
            </select>
        </label>
        @error('question_type')
            <br>
            <small>*El tipo de pregunta es requerido*</small>
            <br>
        @enderror
        <label>
            Tipo de encuesta:
            <select name="survey_type" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="anonymous" {{ old('survey_type', $survey->survey_type) === 'anonymous' ? 'selected' : '' }}>
                    Anónimo</option>
                <option value="public" {{ old('survey_type', $survey->survey_type) === 'public' ? 'selected' : '' }}>Público
                </option>
            </select>
        </label>
        @error('survey_type')
            <br>
            <small>*El tipo de encuesta es requerido*</small>
            <br>
        @enderror
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
            <input type="datetime-local" name="effective_date" value="{{ old('effective_date', $survey->effective_date) }}">
        </label>
        @error('effective_date')
            <br>
            <small>*La fecha y hora de vigencia es requerido*</small>
            <br>
        @enderror
        <label>
            Título:
            <input type="text" name="title" value="{{ old('title', $survey->title) }}">
        </label>
        @error('title')
            <br>
            <small>*El titulo es requerido*</small>
            <br>
        @enderror
        <br>
        <label>
            Indicaciones:
            <textarea name="indications" rows="5">{{ old('indications', $survey->indications) }}</textarea>
        </label>
        @error('indications')
            <br>
            <small>*Las indicaciones son requeridas*</small>
            <br>
        @enderror
        <br>
        <button type="submit">Actualizar formulario</button>
    </form>

@endsection
