<x-app-layout>
    {{-- <section class="bg-cover" style="background-image: url({{asset('img/home/people-821624.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Accion por Igualdad</h1>
                <p class="text-white text-lg mt-2">Pagina de Apoyo para mujeres que sufrieron el caso de violacion. Registra el caso segun el dni de la afectada</p>
                
            </div>
            
        </div>
    </section> --}}

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-2xl mb-6 font-bold">Consultorio jurídico de Acción Verde – Acción Por Igualdad</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-gray-600">Estimadx beneficiarix,</p>
            <p class="text-gray-600" align="justify">Acción Por Igualdad (en adelante, APORI) y su proyecto “Acción Verde” le agradece la confianza por contactarnos a nuestro consultorio jurídico gratuito. Su consulta será respondida con compromiso, empatía y solidaridad a la brevedad posible por una de nuestras asesoras legales.
                <br>
                <br>
                APORI conservará sus datos personales como persona beneficiarix del consultorio jurídico gratuito y cuya información será almacenada en el banco de datos personales de nuestra organización. Por lo que, al llenar la información solicitada en el presente documento, da su consentimiento para que la información consignada en la presente, sea utilizada para el tratamiento de la información para fines estadísticos previo procedimiento de disociación o anonimización.
                <br>
                <br>
                La información brindada para la absolución de su consulta es de carácter confidencial. Es decir, toda revisión, copia, impresión, uso, divulgación o distribución no autorizada está prohibida dentro de este espacio jurídico. No se aceptan responsabilidades por las consecuencias que surjan de nuestras asesorías legales.
                <br>
                <br>
                APORI y su proyecto “Acción Verde” no asume el patrocinio de casos, sino únicamente brinda asesoría legal sobre consultas puntuales.
                <br>
                <br>
                Asimismo, APORI se reserva el derecho de absolver las consultas legales si determina que existe algún conflicto de interés. En ese sentido, no podremos absolver la consulta y se lo comunicaremos a la brevedad posible.
                <br>
                <br>
                Si estas de acuerdo, presione el botón “Aceptar” a fin de continuar con el siguiente paso de su registro.
                </p>
        </div>
    </section>

    <section class="mt-24 bg-yellow-400 py-12">
        <div class="flex justify-center mt-4">
            <a href="{{route('register.create')}}" class="bg-rose-500 hover:bg-rose-600 text-white font-bold py-2 px-4 rounded-lg">
                Aceptar
            </a>
        </div>
        
    </section>
</x-app-layout>