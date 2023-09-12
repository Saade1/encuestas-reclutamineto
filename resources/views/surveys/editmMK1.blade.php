@extends('layouts.plantilla')

@section('title', 'Editar encuesta')

@section('content')

    <h1>Editar encuestas mk2</h1>
    <a href="{{ route('survey.index') }}">Regresar a encuestas</a>
    <form action="{{ route('survey.update', $survey) }}" method="POST">
        @csrf
        @method('put')
        <label>
            Tipo de pregunta:
            <select name="question_type" class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="abierta" {{ old('question_type', $survey->question_type) === 'abierta' ? 'selected' : '' }}>
                    Abierta</option>
                <option value="opcion_multiple"
                    {{ old('opcion_multiple', $survey->question_type) === 'opcion_multiple' ? 'selected' : '' }}>Opción
                    múltiple</option>
                <option value="lista" {{ old('question_type', $survey->question_type) === 'lista' ? 'selected' : '' }}>Lista
                </option>
                <option value="combined"
                    {{ old('question_type', $survey->question_type) === 'combined' ? 'selected' : '' }}>
                    Combinada</option>
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
                <option value="anonima" {{ old('survey_type', $survey->survey_type) === 'anonima' ? 'selected' : '' }}>
                    Anónimo</option>
                <option value="publica" {{ old('survey_type', $survey->survey_type) === 'publica' ? 'selected' : '' }}>
                    Público
                </option>
            </select>
        </label>
        @error('survey_type')
            <br>
            <small>{{ $message }}</small>
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
            <input type="datetime-local" name="effective_date"
                value="{{ old('effective_date', $survey->effective_date) }}">
        </label>
        @error('effective_date')
            <br>
            <small>{{ $message }}</small>
            <br>
        @enderror
        {{-- <label>status
            <select class="custom-select" name="status" aria-label=".form-select-lg example">
                <option value="editando" {{ old('editando', $survey->survey_type) === 'editando' ? 'selected' : '' }}>
                    editando</option>
                <option value="en_proceso"
                    {{ old('en_proceso', $survey->survey_type) === 'en_proceso' ? 'selected' : '' }}>
                    en proceso
                </option>
                <option value="terminada" {{ old('terminada', $survey->survey_type) === 'terminada' ? 'selected' : '' }}>
                    en proceso
                </option>
                <br>

        </label> --}}
        <label>
            Título:
            <input type="text" name="title" value="{{ old('title', $survey->title) }}">
        </label>
        @error('title')
            <br>
            <small>{{ $message }}</small>
            <br>
        @enderror
        <br>
        <label>
            Indicaciones:
            <textarea name="indications" rows="5">{{ old('indications', $survey->indications) }}</textarea>
        </label>
        @error('indications')
            <br>
            <small>{{ $message }}</small>
            <br>
        @enderror
        <br>
        <button type="submit">Actualizar formulario</button>
    </form>

@endsection
