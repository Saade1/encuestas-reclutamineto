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
                        <option value="abierta" {{ old('question_type') == 'abierta' ? 'selected' : '' }}>Abierta
                        </option>
                        <option value="opcion_multiple"
                            {{ old('question_type') == 'opcion_multiple' ? 'selected' : '' }}>
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
                {{-- Agregar preguntas abiertas --}}
                <div id="open-container" style="display: none;">
                    <h1>Preguntas abiertas</h1>
                    <div id="question-container">
                        <div class="input-container_question">
                            <label for="lbl_titulo" class="titulo_label"><b>PREGUNTA:</b></label>
                            <input type="text" name="questions[]" class="titulo_input" required>
                            {{-- <input type="hidden" name="answers[]" class="titulo_input" value=""> --}}
                            <input type="button" class="agregarP" value="+" onclick="agregarPregunta(this)">
                        </div>
                    </div>
                </div>

                <!-- Agregar preguntas de opción múltiple -->
                <div id="multiple-choice-container" style="display: none;">
                    <h1>Preguntas de opción múltiple</h1>
                    <div class="input-container_question">
                        <label for="lbl_titulo" class="titulo_label"><b>PREGUNTA:</b></label>
                        {{-- <input type="text" name="questions[]" class="titulo_input" required> --}}
                    </div>
                    {{-- <div class="input-container_question">
                        <label for="lbl_titulo" class="titulo_label"><b>Opciones de respuesta:</b></label>
                        <input type="text" name="answers[][options][]" class="titulo_input" required>
                        <input type="button" class="agregarP" value="+" onclick="agregarOpcionRespuesta(this)">
                    </div> --}}
                </div>


                {{-- Agregar preguntas en lista --}}
                <div id="list-container" style="display: none;">
                    <h1>Preguntas en lista</h1>
                    <div id="question-container">
                        <div class="input-container_question">
                            <label for="lbl_titulo" class="titulo_label"><b>PREGUNTA:</b></label>

                        </div>
                    </div>
                </div>

                {{-- Agregar preguntas combinadas --}}
                <div id="combined-container" style="display: none;">
                    <h1>Preguntas en combinadas</h1>
                    <div id="question-container">
                        <div class="input-container_question">
                            <label for="lbl_titulo" class="titulo_label"><b>PREGUNTA:</b></label>

                        </div>
                    </div>
                </div>

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
            //funciones para cambiar dependiendo de la pregunta 
            function toggleQuestions(selectElement) {
                var openContainer = document.getElementById('open-container');
                var multipleChoiceContainer = document.getElementById('multiple-choice-container');
                var listContainer = document.getElementById('list-container');
                var combinedContainer = document.getElementById('combined-container');
                var questionType = selectElement.value;

                // Oculta todos los contenedores de preguntas
                openContainer.style.display = 'none';
                multipleChoiceContainer.style.display = 'none';
                listContainer.style.display = 'none';
                combinedContainer.style.display = 'none';

                // Muestra el contenedor de preguntas correspondiente al tipo seleccionado
                if (questionType === 'abierta') {
                    openContainer.style.display = 'block';
                } else if (questionType === 'opcion_multiple') {
                    multipleChoiceContainer.style.display = 'block';
                } else if (questionType === 'lista') {
                    listContainer.style.display = 'block';
                } else if (questionType === 'combinada') {
                    combinedContainer.style.display = 'block';
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
