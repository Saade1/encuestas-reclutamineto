<!doctype html>
<html lang="en">

<head>
    <title>Crear Encuestas</title>
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
        <h1>FORMULARIO PARA CREAR ENCUESTA</h1>
    </div>
    <div class="grafica2">
        <form name="question_type" action="{{ route('survey.store') }}" method="POST">
            @csrf
            <div class="opcion">
                <div>
                    <h1>Tipo de preguntas</h1>
                    <select class="custom-select" name="question_type" aria-label=".form-select-lg example"
                        onchange="toggleQuestions(this)">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1" {{ old('question_type') == '1' ? 'selected' : '' }}>Abierta
                        </option>
                        <option value="2" {{ old('question_type') == '2' ? 'selected' : '' }}>
                            Opción múltiple</option>
                        <option value="3" {{ old('question_type') == '3' ? 'selected' : '' }}>Lista</option>
                        <option value="4" {{ old('question_type') == '4' ? 'selected' : '' }}>Combinada
                        </option>
                    </select>
                </div>
                <div>
                    <h1>Tipo de encuesta</h1>
                    <select class="custom-select" name="survey_type" aria-label=".form-select-lg example">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1" {{ old('survey_type') == '1' ? 'selected' : '' }}>Anónimo</option>
                        <option value="2" {{ old('survey_type') == '2' ? 'selected' : '' }}>Público</option>
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
                <label for="lbl_fn" class="titulo_label"><b>Fecha de vigencia</b></label>
                <input type="datetime-local" class="titulo_input" name="effective_date"
                    value="{{ old('effective_date') }}" required>
            </div>
            <div class="input-container_titulo">
                <label for="lbl_titulo" class="titulo_label"><b>TITULO:</b></label>
                <input type="text" name="title" id="txt_ti" class="titulo_input" value="{{ old('title') }}"
                    required>
            </div>
            <div class="input-container_indicacion">
                <label for="lbl_titulo" class="titulo_label"><b>INDICACION:</b></label>
                <input type="text" name="indications" id="txt_ti" class="titulo_input"
                    value="{{ old('indications') }}" required>
            </div>
            <div>
                {{-- Agregar preguntas  --}}
                <div id="preguntas-container" style="display: none;">
                    <h1>Preguntas</h1>
                    <div id="question-container">
                        <div class="input-container_question">
                            <label for="lbl_titulo" class="titulo_label"><b>PREGUNTA:</b></label>
                            <input type="text" name="questions[]" class="titulo_input">
                            <input type="button" class="agregarP" value="+" onclick="agregarPregunta(this)">
                        </div>
                    </div>
                </div>
                {{-- fin de preguntas --}}

                <div>
                    <input type="submit" class="botones" value="Guardar">
                    <input type="button" class="botones" value="Regresar a encuestas"
                        onclick="location.href='{{ route('survey.index') }}'">
                </div>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>

        <script>
            function toggleQuestions(selectElement) {
                var preguntaContainer = document.getElementById('preguntas-container');
                if (selectElement.value !== "") {
                    preguntaContainer.style.display = "block";
                } else {
                    preguntaContainer.style.display = "none";
                }
            }

            function agregarPregunta(btn) {
                // Clona el div que contiene los campos de pregunta y respuesta y el botón de agregar
                var preguntaDiv = btn.parentElement;
                var nuevaPreguntaDiv = preguntaDiv.cloneNode(true);

                // Limpia los campos de texto clonados
                var camposPregunta = nuevaPreguntaDiv.querySelectorAll('input[name="questions[]"]');
                var camposRespuesta = nuevaPreguntaDiv.querySelectorAll('input[name="answers[]"]');
                camposPregunta.forEach(function(campo) {
                    campo.value = '';
                });
                camposRespuesta.forEach(function(campo) {
                    campo.value = '';
                });

                // Remueve el botón anterior
                preguntaDiv.removeChild(btn);

                // Agrega los campos de pregunta, respuesta y un nuevo botón clonado al contenedor de preguntas
                document.getElementById('question-container').appendChild(nuevaPreguntaDiv);
            }

            function agregarOpcionRespuesta(btn) {
                // Clona el div que contiene el campo de opción de respuesta
                var opcionDiv = btn.parentElement;
                var nuevaOpcionDiv = opcionDiv.cloneNode(true);

                // Limpia el campo de texto clonado
                var campoRespuesta = nuevaOpcionDiv.querySelector('input[name="answers[][options][]"]');
                campoRespuesta.value = '';

                // Remueve el botón anterior
                opcionDiv.removeChild(btn);

                // Agrega el campo de opción de respuesta y un nuevo botón clonado al contenedor de opciones de respuesta
                opcionDiv.appendChild(nuevaOpcionDiv);
            }
        </script>

</body>

</html>
