<!doctype html>
<html lang="en">

<head>
    <title> EDITAR</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="centrar-h1">
        <h1> ESTATUS DE EDICION</h1>
    </div>
    <div class="grafica2">
        <form action="{{ route('survey.update', $survey) }}" method="POST">
            @csrf
            @method('put')
            <div class="opcion">
                <div>
                    <h1>Tipo de preguntas</h1>
                    <select name="question_type" class="form-select" aria-label="Default select example">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1"
                            {{ old('question_type', $survey->question_type) == '1' ? 'selected' : '' }}>
                            Abierta</option>
                        <option value="2"
                            {{ old('question_type', $survey->question_type) == '2' ? 'selected' : '' }}>
                            Opción
                            múltiple</option>
                        <option value="3"
                            {{ old('question_type', $survey->question_type) == '3' ? 'selected' : '' }}>Lista
                        </option>
                        <option value="4"
                            {{ old('question_type', $survey->question_type) == '4' ? 'selected' : '' }}>
                            Combinada</option>
                    </select>
                </div>
                <div>
                    <h1>Tipo de encuesta</h1>
                    <select name="survey_type" class="form-select" aria-label="Default select example">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1" {{ old('survey_type', $survey->survey_type) == '1' ? 'selected' : '' }}>
                            Anónimo</option>
                        <option value="2" {{ old('survey_type', $survey->survey_type) == '2' ? 'selected' : '' }}>
                            Público
                        </option>
                    </select>
                </div>
            </div>
            <div class="input-container">
                <label for="lbl_fn" class="titulo_label"><b>fecha de vigencia</b></label>
                <input type="datetime-local" class="titulo_input" name="effective_date"
                    value="{{ old('effective_date', $survey->effective_date) }}" id="txt_fn" placeholder="aaaa-mm-dd"
                    required>
            </div>
            <div class="input-container_titulo">
                <label for="lbl_titulo" class="titulo_label"><b>TITULO:</b></label>
                <input type="text" name="title" value="{{ old('title', $survey->title) }}" id="txt_ti"
                    class="titulo_input" required>
            </div>
            <div class="input-container_indicacion">
                <label for="lbl_titulo" class="titulo_label"><b>INDICACION:</b></label>
                <input type="text" name="indications" value="{{ old('indications', $survey->indications) }}"
                    id="txt_ti" class="titulo_input" required>
            </div>
            <div>
                {{-- preguntas y respuetas  --}}
                @foreach ($survey->surveys as $index => $surveyItem)
                    <div class="input-container_pregunta">
                        <label for="lbl_titulo" class="titulo_label"><b>PREGUNTA {{ $index + 1 }}:</b></label>
                        <input type="text" name="questions[{{ $index }}]" class="titulo_input"
                            value="{{ $surveyItem->question }}" required>

                        <div class="input-container_respuestas">
                            <div class="respuesta-texto">Respuestas:</div>
                            @php $responses = isset($surveyItem->responses) ? $surveyItem->responses : []; @endphp
                            @for ($i = 0; $i < count($responses); $i += 2)
                                <div class="grupo-respuestas">
                                    @for ($j = $i; $j < $i + 2 && $j < count($responses); $j++)
                                        <input type="text" name="answers[{{ $index }}][]"
                                            class="titulo_input" value="{{ $responses[$j]->answer }}">
                                    @endfor
                                </div>
                            @endfor 
                        </div>
                    </div>
                @endforeach
                {{-- Preguntas y respuetas --}}

                <div>
                    <input type="submit" class="botones" value="Guardar">
                    <input type="button" class="botones" value="Regresar a encuestas"
                        onclick=" location.href='{{ route('survey.index') }}'">
                </div>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
        <script src="{{ asset('assets/js/edit.js') }}"></script>
</body>

</html>
