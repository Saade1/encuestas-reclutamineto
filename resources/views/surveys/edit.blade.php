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
                        <option value="abierta"
                            {{ old('question_type', $survey->question_type) === 'abierta' ? 'selected' : '' }}>
                            Abierta</option>
                        <option value="opcion_multiple"
                            {{ old('opcion_multiple', $survey->question_type) === 'opcion_multiple' ? 'selected' : '' }}>
                            Opción
                            múltiple</option>
                        <option value="lista"
                            {{ old('question_type', $survey->question_type) === 'lista' ? 'selected' : '' }}>Lista
                        </option>
                        <option value="combined"
                            {{ old('question_type', $survey->question_type) === 'combined' ? 'selected' : '' }}>
                            Combinada</option>
                    </select>
                </div>
                <div>
                    <h1>Tipo de encuesta</h1>
                    <select name="survey_type" class="form-select" aria-label="Default select example">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="anonima"
                            {{ old('survey_type', $survey->survey_type) === 'anonima' ? 'selected' : '' }}>
                            Anónimo</option>
                        <option value="publica"
                            {{ old('survey_type', $survey->survey_type) === 'publica' ? 'selected' : '' }}>
                            Público
                        </option>
                    </select>
                </div>
            </div>
            <div class="input-container">
                <label for="lbl_fn" class="titulo_label"><b>fecha de viegencia</b></label>
                <input type="datetime-local" class="titulo_input" name="effective_date"
                    value="{{ old('effective_date', $survey->effective_date) }}" id="txt_fn" placeholder="aaaa-mm-dd"
                    require>
            </div>
            <div class="input-container_titulo">
                <label for="lbl_titulo" class="titulo_label"><b>TITULO:</b></label>
                <input type="text" name="title" value="{{ old('title', $survey->title) }}" id="txt_ti"
                    class="titulo_input" require>
            </div>
            <div class="input-container_indicasio">
                <label for="lbl_titulo" class="titulo_label"><b>INDICACION:</b></label>
                <input type="text" name="indications" value="{{ old('indications', $survey->indications) }}"
                    id="txt_ti" class="titulo_input" require>
            </div>
            <div>
                {{-- <div class="input-container_pregunta">
                    <label for="lbl_titulo" class="titulo_label"><b>PREGUNTA:</b></label>
                    <input type="text" name="txt_title" id="txt_ti" class="titulo_input" require>
                    <input type="submit" class="agregarP" name="agregar" id="agregar_encuesta" value="+">
                </div> --}}
                <div>
                    <input type="submit" class="botones" value="Guardar">
                    {{-- <input type="submit" class="botones" name="agregar" id="eliminar_encuesta" value="cancelar">
                    <input type="submit" class="botones" name="agregar" id="enviar_encuesta" value="enviar encuesta"> --}}
                    <input type="submit" class="botones" value="Regresar a encuestas"
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
</body>

</html>
