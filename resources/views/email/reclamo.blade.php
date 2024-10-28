<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento HTML5</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<p>Estimado Sr(a). {{$detalles->primerNombre.' '.$detalles->apellidoPaterno.' '.$detalles->apellidoMaterno}}</p>
    <p>Ante todo, expresamos nuestro cordial saludo y en ese sentido, 
        manifestarle nuestras sinceras disculpas por las molestias ocasionadas. </p>
    <p>Le informamos que su reclamo ha sido RECIBIDO, y que nuestra empresa
        le informará dentro de los proximos 15 días hábiles que acciones se realizarán para su caso.
    </p>

    <p>Le agradecemos por su comprensión.</p>
    <p>Atentamente.</p>
    <h4>{{$empresa->nombreComercial}}.</h4>
    <small style="color:gray">Atención al cliente.</small>
    
</body>
</html>