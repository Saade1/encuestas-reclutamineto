<!doctype html>
<html lang="en">

<head>
    <title>ENCUESTAS</title>
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
        <h1 class="encabezado"> ENCUESTAS</h1>
    </div>
    <div class="grafica">
        <div> <input type="submit" class="custom-select3" name="agregar" id="agregar_encuesta"
                value="CREAR UNA ENCUESTA" onclick=" location.href='{{ route('survey.create', $survey) }}'"></div>
        <div class="table-responsive">
            <table class="table-custom">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>TITULO</th>
                        <th>fecha y hora de creacion.</th>
                        <th>fecha y hora de actulizacion</th>
                        <th>fecha y hora de vigencia</th>
                        <th>tipo</th>
                        <th>estatus</th>
                        <th>Editar</th>
                        <th>eliminar</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($survey as $surveys)
                        <tr class="table-primary">
                            <td scope="row" class="first-column">{{ $surveys->id }}</td>
                            <td>{{ $surveys->title }}</td>
                            <td>{{ $surveys->created_at }}</td>
                            <td>{{ $surveys->updated_at }}</td>
                            <td>{{ $surveys->effective_date }}</td>
                            <td>
                                @if ($surveys->question_type == 1)
                                    Abierta
                                @elseif ($surveys->question_type == 2)
                                    Opción Múltiple
                                @elseif ($surveys->question_type == 3)
                                    Lista
                                @elseif ($surveys->question_type == 4)
                                    Combinada
                                @endif
                            </td>
                            <td>
                                @if ($surveys->status == 1)
                                    Editando
                                @elseif ($surveys->status == 2)
                                    En proceso
                                @elseif ($surveys->status == 3)
                                    Editada
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('survey.edit', $surveys) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>

                            </td>
                            <td>
                                <form action="{{ route('survey.destroy', $surveys) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Eliminar encuesta</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
