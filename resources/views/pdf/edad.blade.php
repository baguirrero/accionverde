<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>Reporte de Rango de Edades</title>
    
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
    <h5 class=" font-weight-bold text-center">Reporte de Rango de Edades de los Casos</h5>

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">DNI</th>
            <th scope="col">Apellidos y Nombres</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Edad</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cases_edad as $case)
          <tr>
            <td>{{$case->dni}}</td>
            <td>{{$case->ape_pater}} {{$case->ape_mater}} {{$case->names}}</td>
            <td>{{$case->email}}</td>
            <td>{{$case->phone}}</td>
            <td>{{$case->edad_estimado}} años</td>
          </tr>
          @endforeach
        </tbody>
    </table>

</div>
</body>
</html>