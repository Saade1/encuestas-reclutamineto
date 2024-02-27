<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encuesta: {{ $data['formData']->title }}</title>
</head>
<body>
    <h2>{{ $data['formData']->title }}</h2>
    <p>{{ $data['formData']->indications }}</p>
    <p>Por favor, responda antes del: {{ \Carbon\Carbon::parse($data['formData']->effective_date)->format('d/m/Y H:i') }}</p>
    <p>Para completar la encuesta, haga clic en el siguiente enlace:</p>
    <a href="{{ $data['response_link'] }}">Responder encuesta</a>

    <p>Aquí va el resto del contenido del correo electrónico...</p>
</body>
</html>
