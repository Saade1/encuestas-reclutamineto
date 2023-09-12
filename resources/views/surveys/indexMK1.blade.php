@extends ('layouts.plantilla')

@section('title', 'Encuestas')

@section('content')

    <h1>Bienvenido a la página inicial de encuestas</h1>
    <a href="{{ route('survey.create') }}">Crear encuesta</a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Fecha y hora de creación</th>
                <th>Fecha y hora de vigencia</th>
                <th>Tipo</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($survey as $surveys)
                <tr>
                    <td>{{ $surveys->id }}</td>
                    <td>{{ $surveys->title }}</td>
                    <td>{{ $surveys->created_at }}</td>
                    <td>{{ $surveys->effective_date }}</td>
                    <td>{{ $surveys->survey_type }}</td>
                    {{-- <td>
                        @if ($surveys->survey_type === 'public')
                            Público
                        @elseif ($surveys->survey_type === 'anonymous')
                            Anónimo
                        @else
                        @endif
                    </td> --}}
                    <td>{{ $surveys->status }}</td>
                    <td>
                        <a href="{{ route('survey.show', $surveys) }}">Ver</a>
                        <a href="{{ route('survey.edit', $surveys) }}">Editar</a>
                        <form action="{{ route('survey.destroy', $survey) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit">Elimar encuesta</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $survey->links() }}
@endsection
