<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/showForm.css') }}">
    <title>RESPONDER CUESTIONARIO</title>
</head>

<body>
    <div class="container">
        <div class="form-info">
            <p>TIPO DE ENCUESTA: {{ $form->survey_type == 1 ? 'Anónimo' : 'Público' }}</p>
            <p>FECHA DE VIGENCIA: {{ $formattedEffectiveDate }}</p>
        </div>
        <h1>TITULO: {{ $form->title }}</h1>
        <p>INDICACIONES: {{ $form->indications }}</p>
        <form action="{{ route('survey.submit', ['user_id' => $user_id, 'form_id' => $form->id]) }}" method="post">
            @csrf
            <lavel>NOMBRE DEL ENCUESTADO:</lavel>
            <input type="text" name="user_name" {{ $form->survey_type == 2 ? 'required' : '' }}>
            @foreach ($survey_ids as $survey_id)
                <input type="hidden" name="survey_ids[]" value="{{ $survey_id }}">
            @endforeach
            @foreach ($questions as $question)
                <input type="hidden" name="question_ids[]" value="{{ $question->id }}">
                
                <label for="question_{{ $question->id }}">PREGUNTA: {{ $question->question }}</label>
                <br>
                @if ($question->form->form_type == 1)
                    <!-- Pregunta abierta -->
                    <textarea name="answers[{{ $question->id }}]" id="question_{{ $question->id }}"></textarea>
                @elseif ($question->form->form_type == 2)
                    <!-- Pregunta de opción múltiple -->
                    <select class="custom-select" name="selected_responses_single[{{ $question->id }}]">
                        @foreach ($question->responses as $response)
                            <option value="{{ $response->answer }}">{{ $response->answer }}</option>
                        @endforeach
                    </select>
                @elseif ($question->form->form_type == 3)
                    <!-- Pregunta de lista -->
                    <select class="custom-select" name="selected_responses_multiple[{{ $question->id }}][]" multiple>
                        @foreach ($question->responses as $response)
                            <option value="{{ $response->answer }}">{{ $response->answer }}</option>
                        @endforeach
                    </select>
                @endif
                <br>
            @endforeach

            <button type="submit">Enviar Respuestas</button>
            <button type="button" class="btn-cancel" onclick="location.href=''">Cancelar</button>
        </form>

    </div>
</body>

</html>
