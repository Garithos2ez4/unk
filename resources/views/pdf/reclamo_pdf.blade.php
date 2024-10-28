<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constancia de Reclamo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
     table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Forzar ancho fijo de las columnas */
            font-size: 10px;
        }
        table, th, td {
            border: 1px solid black;
            font-family: Arial, sans-serif; 
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
</style>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="4"> LIBRO DE RECLAMACIONES</th>
                <td colspan="8"  rowspan="2">
                    <h3>HOJA DE RECLAMACIÓN</h3>
                    <p>{{$detalles->codigo}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2"> FECHA:</td>
                <td colspan="2"> {{$detalles->fechaReclamo->format('Y-m-d')}}</td>
            </tr>
            <tr>
                    <td colspan="12"> <strong>{{$empresa->razonSocial}} / {{$empresa->rucEmpresa}}</strong></td>
            </tr>
            <tr>
                <td colspan="12">{{$empresa->ubicacion}}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="12">1. IDENTIFICAIÓN DEL CONSUMIDOR RECLAMANTE</th>
            </tr>
            <tr>
                <td colspan="2">NOMBRE(S):</td>
                <td colspan="10">{{$detalles->primerNombre.' '.$detalles->segundoNombre.' '.$detalles->apellidoPaterno.' '.$detalles->apellidoMaterno}}</td>
            </tr>
            <tr>
                <td colspan="2">DIRECCIÓN:</td>
                <td colspan="10">{{$detalles->direccion}}</td>
            </tr>
            <tr>
                <td colspan="2">TIPO DE DOCUMENTO:</td>
                <td colspan="2">{{$detalles->tipoDocumento}}</td>
                <td colspan="2">{{$detalles->numeroDocumento}}</td>
                <td colspan="1">TELF:</td>
                <td colspan="1">{{$detalles->numeroTelefono}}</td>
                <td colspan="1">EMAIL:</td>
                <td colspan="3">{{$detalles->correoElectronico}}</td>
            </tr>
            <tr>
                <th colspan="12">APODERADO</th>
            </tr>
            <tr>
                <td colspan="2">NOMBRE(S):</td>
                <td colspan="10">{{$detalles->apoderado}}</td>
            </tr>
            <tr>
                <th colspan="12">2. IDENTIFICAIÓN DEL BIEN CONTRATADO</th>
            </tr>
            <tr>
                <td colspan="2">PRODUCTO O SERVICIO:</td>
                <td colspan="10">{{$detalles->producto}}</td>
            </tr>
            <tr>
                <td colspan="12">DESCRIPCIÓN DEL PRODUCTO:</td>
            </tr>
            <tr>
                <td colspan="12">{{$detalles->detalleProducto}}</td>
            </tr>
            <tr>
                <th colspan="6">3. DETALLE DE LA RECLAMACIÓN</th>
                <td colspan="3">RECLAMO O QUEJA:</td>
                <td colspan="3">{{$detalles->tipoReclamo}}</td>
            </tr>
            <tr>
                <td colspan="12">DETALLE DEL RECLAMO:</td>
            </tr>
            <tr>
                <td colspan="12">{{$detalles->detalleReclamo}}</td>
            </tr>
            <tr>
                <th colspan="12">4. OBSEVACIONES Y ACCIONES TOMADAS POR EL PROVEEDOR</th>
            </tr>
            <tr>
                <td colspan="12">El plazo máximo de la atención de su reclamo es 15 días habiles.</td>
            </tr>
            <tr>
                <td colspan="12">
                    <ul>
                        <li>La formulación del reclamo no impide acudir a otras vias de solución de controversias ni es requisito para interponer una denuncia ante el INDECOPI</li>
                        <li>El proveedor deberá dar respuesta al reclamo en un plazo no mayor a 15 días hábiles como lo establece la INDECOPI.</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>