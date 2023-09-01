@extends ('layouts.plantilla')

@section('title', 'Encuestas')

@section('content')

    <h1>Bienvenido a la pagina inicial de encuestas</h1>
    <a href="{{route('survey.create')}}">Crear encuesta</a>
    
    <ul>
        @foreach ($survey as $surveys)
            <li>
                <a href="{{route('survey.show',$surveys->id)}}">{{$surveys->title}}</a>
            </li>
            
        @endforeach
    </ul>
    {{$survey->links()}}
@endsection
