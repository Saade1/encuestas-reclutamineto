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
                        <th>Titulo</th>
                        <th>Fecha y hora de creacion.</th>
                        <th>Fecha y hora de actulizacion</th>
                        <th>Fecha y hora de vigencia</th>
                        <th>Tipo</th>
                        <th>Estatus</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($survey as $surveys)
                        <tr class="table-primary">
                            <td scope="row" class="first-column">{{ $surveys->id }}</td>
                            <td>{{ $surveys->title }}</td>
                            <td>@php echo date('d/m/Y H:i:s', strtotime($surveys->created_at)); @endphp</td>
                            <td>@php echo date('d/m/Y H:i:s', strtotime($surveys->updated_at)); @endphp</td>
                            <td>@php echo date('d/m/Y H:i:s', strtotime($surveys->effective_date)); @endphp</td>
                            <td>
                                @if ($surveys->form_type == 1)
                                    Abierta
                                @elseif ($surveys->form_type == 2)
                                    Opción Múltiple
                                @elseif ($surveys->form_type == 3)
                                    Lista
                                @elseif ($surveys->form_type == 4)
                                    Combinada
                                @endif
                            </td>
                            <td>
                                @if ($surveys->status == 1)
                                    Editando
                                @elseif ($surveys->status == 2)
                                    En proceso
                                @elseif ($surveys->status == 3)
                                    Terminada
                                @elseif ($surveys->status == 4)
                                    Combinada
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('survey.edit', $surveys) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form class="deleteForm" action="{{ route('survey.destroy', $surveys) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger deleteButton" data-bs-toggle="modal"
                                        data-bs-target="#myModal-{{ $surveys->id }}">Eliminar encuesta</button>
                                </form>
                                <div class="modal" id="myModal-{{ $surveys->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle">¿Está seguro de borrar la
                                                    encuesta {{ $surveys->id }}?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Al hacer clic en "Borrar", se eliminará permanentemente la encuesta.
                                                    Esta acción no se puede deshacer. ¿Está seguro de que desea
                                                    continuar?</p>
                                                <p>Al hacer clic en "Cancelar", no se eliminará la encuesta y la acción
                                                    se detendrá.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" id="confirmDeleteButton"
                                                    class="btn btn-primary">Borrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            {{-- <form action="{{ route('survey.destroy', $surveys) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar encuesta</button>
                            </form> --}}
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/js/index.js') }}"></script>
</body>

</html>
