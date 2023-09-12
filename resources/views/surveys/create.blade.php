<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear encuestas</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .custom-select {
            background-color: #AFF4C6;
            height: 30px;
            width: 250px;
            margin: 24px;
            display: inline-block;
            vertical-align: top;
            border-radius: 30px;
            border: none;
        }

        .botones {
            background-color: #70cad2;
            height: 30px;
            width: 180px;
            margin: 24px;
            display: inline-block;
            vertical-align: top;
            border-radius: 30px;
            border: none;
        }

        .agregarP {
            background-color: #AFF4C6;
            height: 30px;
            width: 30px;
            margin: 24px;
            display: inline-block;
            vertical-align: top;
            border: none;
        }

        .titulo_label {
            font-size: 15px;
            margin-left: 30px;
            margin-right: 10px;
        }

        .titulo_input {
            font-size: 16px;
            width: 300px;
            height: 40px;
            border-radius: 5px;
            background-color: #e6e6e6;
            border: none;
            margin-top: 10px;
        }

        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .opcion h1 {
            font-size: 18px;
        }

        .opcion {
            display: flex;
            align-items: center;
        }

        .opcion>div {
            margin-right: 20px;
        }

        .opcion select,
        .opcion h1 {
            display: inline-block;
            vertical-align: middle;
        }

        .opcion h1 {
            margin-right: 10px;
            margin-left: 30px;
        }
    </style>
</head>

<body>
    <div>
        <a href="{{ route('survey.index') }}" class="botones">Regresar a encuestas</a>
    </div>
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
        {{-- <div class="input-container">
            <label for="lbl_fn" class="titulo_label"><b>Fecha de vigencia</b></label>
            <input type="datetime-local" class="titulo_input" name="created_at" value="{{ old('created_at') }}"
                required>
        </div>
        <div class="input-container">
            <label for="lbl_fn" class="titulo_label"><b>Fecha de vigencia</b></label>
            <input type="datetime-local" class="titulo_input" name="updated_at" value="{{ old('updated_at') }}"
                required>
        </div> --}}
        <div class="input-container">
            <label for="lbl_fn" class="titulo_label"><b>Fecha de vigencia</b></label>
            <input type="datetime-local" class="titulo_input" name="effective_date" value="{{ old('effective_date') }}"
                required>
        </div>
        <div class="input-container">
            <label for="lbl_titulo" class="titulo_label"><b>Título:</b></label>
            <input type="text" name="title" id="txt_ti" class="titulo_input" value="{{ old('title') }}"
                required>
        </div>
        <div class="input-container">
            <label for="lbl_titulo" class="titulo_label"><b>Indicaciones:</b></label>
            <input type="text" name="indications" id="txt_ti" class="titulo_input"
                value="{{ old('indications') }}" required>
        </div>
        {{-- <div class="input-container">
        <label for="lbl_titulo" class="titulo_label"><b>PREGUNTA:</b></label>
        <input type="text" name="txt_title" id="txt_ti" class="titulo_input" required>
        <input type="submit" class="agregarP" name="agregar" id="agregar_encuesta" value="+">
    </div> --}}
        <div>
            <input type="submit" class="botosx.k xjnjnsxnes" id="guardar_encuesta" value="Guardar formulario">
            {{-- <input type="submit" class="botones" name="agregar" id="eliminar_encuesta" value="Cancelar">
        <input type="submit" class="botones" name="agregar" id="enviar_encuesta" value="Enviar encuesta"> --}}
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
