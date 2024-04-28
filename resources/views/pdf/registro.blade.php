<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Información del Formulario</title>
<!-- Margenes de la hoja -->

<style>
	.center {
        font-size: 10px;
	}

    @page {
		margin-left: 0px;
		margin-right: 10px;
	}
</style>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
</header>
<h5 style="text-align: center"><strong>TABLA DE REGISTROS</strong></h5>
    <table id="example" class="table center">
       
        <thead class="thead-dark text-sm">
            <tr>
               
                <th scope="col">DNI</th>
                <th scope="col">Apellidos y Nombres</th>
                <th scope="col">Nombre Social</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Nacionalidad</th>
                <th scope="col">Email</th>
                <th scope="col">Hijos</th>
                <th scope="col">N° Hijos</th>
                <th scope="col">Identidad</th>
                <th scope="col">Lugar Nacimiento</th>
                <th scope="col">Laboral</th>
                <th scope="col">Residencia</th>
                <th scope="col">Grado</th>
                <th scope="col">Estado Civil</th>
                <th scope="col">Profesion</th>
                
                
                
            </tr>
        </thead>
        <tbody>
            @foreach ($persons as $person)
            <tr>
                
                
                <td>{{$person->dni}}</td>
                <td>{{$person->ape_mater}} {{$person->ape_mater}} {{$person->names}}</td>
                <td>{{$person->social_name}}</td>
                <td>{{$person->fecha_naci}}</td>
                <td>{{$person->nacionalidad}}</td>
                <td>{{$person->email}}</td>
                <td>{{$person->son->name}}</td>
                <td>{{$person->num_hijos}}</td>
                <td>{{$person->identity->name}}</td>
                <td>{{$person->birthplace->name}}</td>
                <td>{{$person->employment->name}}</td>
                <td>{{$person->homeplace->name}}</td>
                <td>{{$person->instruction->name}}</td>
                <td>{{$person->maritalstatus->name}}</td>
                <td>{{$person->profession->name}}</td>
        
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
</div>
</div>

</body>
</html>