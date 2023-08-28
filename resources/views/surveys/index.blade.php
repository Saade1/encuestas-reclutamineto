@extends ('layouts.plantilla')

@section('title', 'Encuestas')

@section('content')

    <h1>Bienvenido a la pagina inicial de encuestas</h1>
    <a href="{{route('survey.create')}}">Crear encuesta</a>
    <ul>
        @foreach ($survey as $surveys)
            <li>
                {{$surveys->id}}
            </li>
        @endforeach
    </ul>
    {{$survey->links()}}
@endsection
