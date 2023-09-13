<!doctype html>
<html lang="en">

<head>
    <title> crear encuestas</title>
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
        <h1> FORMULARIO PARA CREAR ENCUESTA</h1>
    </div>
    <div class="grafica2">
      <form action="{{ route('survey.store') }}" method="POST">
        @csrf
        <div class="opcion">
            <div>
              <h1>Tipo de preguntas</h1>
                <select class="custom-select" name="question_type" aria-label=".form-select-lg example">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="abierta" {{ old('question_type') == 'abierta' ? 'selected' : '' }}>Abierta</option>
                    <option value="opcion_multiple" {{ old('question_type') == 'opcion_multiple' ? 'selected' : '' }}>
                        Opción múltiple</option>
                    <option value="lista" {{ old('question_type') == 'lista' ? 'selected' : '' }}>Lista</option>
                    <option value="combinada" {{ old('question_type') == 'combinada' ? 'selected' : '' }}>Combinada
                    </option>
                </select>
            </div>
            <div>
                <h1>Tipo de encuesta</h1>
                <select class="custom-select" name="survey_type" aria-label=".form-select-lg example">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="anonima" {{ old('survey_type') == 'anonima' ? 'selected' : '' }}>Anónimo</option>
                    <option value="publica" {{ old('survey_type') == 'publica' ? 'selected' : '' }}>Público</option>
                </select>
            </div>
            <div>
                <h1>status</h1>
                <select class="custom-select" name="status" aria-label=".form-select-lg example">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="editando" {{ old('editando') == 'editando' ? 'selected' : '' }}>Editando</option>
                    <option value="en_proceso" {{ old('en_proceso') == 'en_proceso' ? 'selected' : '' }}>En proceso
                    </option>
                    <option value="terminada" {{ old('terminada') == 'terminada' ? 'selected' : '' }}>Terminada
                    </option>
                </select>
            </div>
        </div>
        <div class="input-container">
            <label for="lbl_fn" class="titulo_label"><b>fecha de viegencia</b></label>
            <input type="datetime-local" class="titulo_input" name="effective_date" value="{{ old('effective_date') }}"
                required>
        </div>
        <div class="input-container_titulo">
            <label for="lbl_titulo" class="titulo_label"><b>TITULO:</b></label>
            <input type="text" name="title" id="txt_ti" class="titulo_input" value="{{ old('title') }}"
                required>
        </div>
        <div class="input-container_indicasio">
            <label for="lbl_titulo" class="titulo_label"><b>INDICACION:</b></label>
            <input type="text" name="indications" id="txt_ti" class="titulo_input"
            value="{{ old('indications') }}" required>
        </div>
        {{-- <div>
            <div class="input-container_pregunta">
                <label for="lbl_titulo" class="titulo_label"><b>PREGUNTA:</b></label>
                <input type="text" name="txt_title" id="txt_ti" class="titulo_input" require>
                <input type="submit" class="agregarP" name="agregar" id="agregar_encuesta" value="+">
            </div> --}}
            <div>
                <input type="submit" class="botones" value="guardar">
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
