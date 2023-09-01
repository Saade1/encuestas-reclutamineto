

@extends('layouts.plantilla')

@section('title', 'Encuesta ' . $survey->title)

@section('content')

<h1>Encuesta {{$survey->title}}</h1>
<a href="{{route('survey.index')}}">Regresar a encuestas</a>
<br>
<a href="{{route('survey.edit',$survey)}}">Editar encuesta</a>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Titulo</th>
            <th>Fecha y hora de creacion</th>
            <th>Fecha y hora de vigencia</th>
            <th>Tipo</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$survey->id}}</td>
            <td>{{$survey->title}}</td>
            <td>{{$survey->created_at}}</td>
            <td>{{$survey->effective_date}}</td>
            <td>{{$survey->survey_type}}</td>
            
        </tr>
    </tbody>
</table>

@endsection
