<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mandar correos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Include jQuery and Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>
<body>
    <div class="centrar-h1">
        <h1> Mandar correos</h1>
    </div>
    <div class="centrar-h1">
        <h1> Mandar correos</h1>
    </div>
    <div class="grafica2">
        <form id="emailForm" action="{{ route('email.store') }}" method="POST">
            @csrf
            <input type="hidden" name="form_id" value="{{ $formId }}">

            <table>
                <thead>
                    <tr>
                        <th>
                            <button type="button" id="selectAllBtn">Seleccionar todos</button>
                            <button type="button" id="deselectAllBtn">Deseleccionar todos</button>
                        </th>
                        <th>Nombres</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <input type="checkbox" name="user_id[]" value="{{ $user->id }}">
                            </td>
                            <td>{{ $user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <input type="submit" class="btn btn-primary buttons" value="ENVIAR CUESTIONARIO"
                        onclick="location.href='{{ route('survey.index') }}'">
            <input type="button" class="btn btn-primary buttons" value="REGRESAR A ENCUESTAS"
                        onclick="location.href='{{ route('survey.index') }}'">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/js/send.js') }}"></script>
</body>
</body>
</html>