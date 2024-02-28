<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encuesta: {{ $data['formData']->title }}</title>
</head>
<body>
    <h2>Estimado/a {{ $data['name'] }},</h2>
    <p>Espero este mensaje le encuentre bien.</p>
    <p>Le escribo para informarle sobre una encuesta importante que estamos llevando a cabo en nuestra organización. La encuesta se titula: "{{ $data['formData']->title }}".</p>
    <p>Antes de continuar, por favor, tenga en cuenta las siguientes indicaciones:</p>
    <p>{{ $data['formData']->indications }}</p>
    <p>Le agradeceríamos enormemente si pudiera completar esta encuesta antes del {{ \Carbon\Carbon::parse($data['formData']->effective_date)->format('d/m/Y H:i') }}.</p>
    <p>Para acceder a la encuesta y proporcionar sus respuestas, por favor haga clic en el siguiente enlace:</p>
    <a href="{{ $data['response_link'] }}">Responder la encuesta aquí</a>

    <p>Quedo a su disposición para cualquier pregunta o aclaración adicional que pueda necesitar.</p>

    <p>Atentamente,</p>
    <p>{{ $data['sender_company'] }}</p>

</body>
</html>
