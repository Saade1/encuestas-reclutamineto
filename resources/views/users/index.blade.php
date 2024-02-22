<!-- email.survey.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Cuestionario</title>
</head>
<body>
    <p>Hola {{ $data['nombre'] }},</p>
    <p>Te invitamos a completar nuestro cuestionario. Haz clic en el siguiente enlace:</p>
<a href="{{ route('responder.index') }}">Ir al cuestionario</a></body>
</html>
