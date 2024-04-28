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
        <h5 class=" font-weight-bold text-center">Reporte de Casos por Mes</h5>

        <div class="grid lg:grid-cols-2 gap-4 mt-4">
            <div>
                <strong>Cantidad: </strong>
            </div>
            <div>
                @foreach ($rmes as $item)
                    <p>{{$item->cantidad}}</p>
                @endforeach
            </div>
        </div>

        @switch($request->id_mes)
                        @case(1)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>ENERO</p></strong>
                            </div>
                            @break
                        @case(2)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>FEBRERO</p></strong>
                            </div>
                            @break
                        @case(3)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>MARZO</p></strong>
                            </div>
                            @break
                            @case(4)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>ABRIL</p></strong>
                            </div>
                            @break
                            @case(5)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>MAYO</p></strong>
                            </div>
                            @break
                            @case(6)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>JUNIO</p></strong>
                            </div>
                            @break
                            @case(7)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>JULIO</p></strong>
                            </div>
                            @break
                            @case(8)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>AGOSTO</p></strong>
                            </div>
                            @break
                            @case(9)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>SETIEMBRE</p></strong>
                            </div>
                            @break
                            @case(10)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>OCTUBRE</p></strong>
                            </div>
                            @break
                            @case(11)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>NOVIEMBRE</p></strong>
                            </div>
                            @break
                            @case(12)
                            <div class="mt-4">
                                <strong>Mes seleccionado: <p>DICIEMBRE</p></strong>
                            </div>
                            @break
                        @default
                            
        @endswitch

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
              @foreach ($rmeses as $mes)
              <tr>
                <td>{{$mes->dni}}</td>
                <td>{{$mes->ape_pater}} {{$mes->ape_mater}} {{$mes->names}}</td>
                <td>{{$mes->email}}</td>
                <td>{{$mes->phone}}</td>
                <td>{{$mes->date_create}}</td>
              </tr>
              @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>