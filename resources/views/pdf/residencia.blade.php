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
        <h5 class=" font-weight-bold text-center">Reporte de Casos por Lugar de Residencia</h5>

        <table class="table center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">DNI</th>
                <th scope="col">Apellidos y Nombres</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Lugar de Residencia</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($residencia as $resi)
              <tr>
                <td>{{$resi->dni}}</td>
                <td>{{$resi->ape_pater}} {{$resi->ape_mater}} {{$resi->names}}</td>
                <td>{{$resi->email}}</td>
                <td>{{$resi->phone}}</td>
                <td>{{$resi->Lugar_residencia}}</td>
              </tr>
              @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>