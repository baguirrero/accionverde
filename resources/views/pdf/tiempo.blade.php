<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>Empleabilidad</title>
    <style>
	.center {
        font-size: 10px;
	}

    @page {
		margin-left: 20px;
		margin-right: 20px;
	}
</style>
</head>
<body>

    <div class="center py-5">
        <h5 class=" font-weight-bold text-center">Reporte Tiempo de Consulta de Atencion de Consulta</h5>

        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">DNI</th>
                <th scope="col">Apellidos y Nombres</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Tiempo Estimado</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cases_tiempo as $tiempo)
              <tr>
                <td>{{$tiempo->dni}}</td>
                <td>{{$tiempo->ape_pater}} {{$tiempo->ape_mater}} {{$tiempo->names}}</td>
                <td>{{$tiempo->email}}</td>
                <td>{{$tiempo->phone}}</td>
                <td>{{$tiempo->dias_transcurridos}} Dias | Horas: {{\Carbon\Carbon::parse($tiempo->tiempo_trans)->format('H:i:s')}}</td>
              </tr>
              @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>