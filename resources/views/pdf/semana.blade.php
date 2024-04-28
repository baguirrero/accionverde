<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>AccionVerde</title>
    
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
        <h5 class=" font-weight-bold text-center">Reporte de Casos por Semana(Fecha Seleccionada)</h5>

        <div class="grid lg:grid-cols-2 gap-4 mt-4">
            <div>
                <strong>Cantidad: </strong>
            </div>
            <div>
                @foreach ($rsemana as $item)
                    <p>{{$item->cantidad}}</p>
                @endforeach
            </div>
        </div>

        <div class="mt-4">
            <strong>Fechas Seleccionadas: <p>{{$request->fech_1}} a {{$request->fech_2}}</p></strong>

        </div>

        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">DNI</th>
                <th scope="col">Apellidos y Nombres</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha de Registro</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rsemanas as $semana)
              <tr>
                <td>{{$semana->dni}}</td>
                <td>{{$semana->ape_pater}} {{$semana->ape_mater}} {{$semana->names}}</td>
                <td>{{$semana->email}}</td>
                <td>{{$semana->phone}}</td>
                <td>{{$semana->date_create}}</td>
              </tr>
              @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>