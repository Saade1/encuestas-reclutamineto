<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESPONDER CUESTIONARIO</title>
</head>
<body>
    <h1>Cuestionario: {{ $form->title }}</h1>
    <p>Las indicaciones son: {{ $form->indications }}</p>
    <form action="{{ route('survey.submit', ['user_id' => $user_id, 'form_id' => $form->id]) }}" method="post">
        @csrf
        <input type="hidden" name="survey_id" value="{{ $survey_id }}">
        @foreach ($form->surveys as $question)
            <label for="question_{{ $question->id }}">Pregunta: {{ $question->question }}</label><br>
            @if ($question->responses->isNotEmpty())
                <ul>
                    @foreach ($question->responses as $response)
                        <li>
                            <input type="radio" name="selected_responses[]" value="{{ $response->id }}">
                            {{ $response->answer }}
                        </li>
                    @endforeach
                </ul>
            @else
                <textarea name="answers[{{ $question->id }}]" id="question_{{ $question->id }}"></textarea><br>
            @endif
        @endforeach
        <button type="submit">Enviar Respuestas</button>
    </form>
</body>
</html>
