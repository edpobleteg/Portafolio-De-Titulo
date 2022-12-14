@extends('layouts.layout-user')

@section('title') Crematorio @endsection

@section('content')

<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-2 info-container">
            <div class="m-3">
                <h1 class="mt-3 display-6 fw-bold c-text-black f-size-xl">Servicio de Cremación</h1>
                <div class="hline mb-5"></div>
                <p class="fs-6">
                    Los vecinos pueden optar a la incineración de sus mascotas para luego llevarlas con ellos.
                    Los encargados de esto son empresas externas a la Municipalidad y solo entregamos 
                    la información para una elección respetuosa con el momento.
                </p><br>
                <p class="fs-4 fw-bold f-size-lg c-text-purple-1">
                    Cremación Individual
                </p>
                <p class="fs-6">
                    En las cremaciones individuales la mascota se incinerará de forma individual con 
                    el fin de guardar sus cenizas para el propietario que así lo desee. Las cenizas de 
                    las cremaciones individuales se depositan en una urna o ánfora después de unos días. 
                    Las cenizas son entregadas en un ánfora que el propietario puede solicitar con un 
                    cargo adicional.
                </p>
                <ul>
                    <li>
                        Greda estándar con grabado de la mascota: $ 7.000 + IVA
                    </li>
                    <li>
                        Madera con impresión de huella de nariz o plantar de la mascota: $ 20.000 + IVA
                    </li>
                    <li>
                        Planta ecológica que puede ser roble, quillay, boldo, peumo, entre otros: $ 20.000 + IVA
                    </li>
                    <li>
                        Plaquita conmemoratoria entrega a domicilio: $ 4.000 + IVA
                    </li>
                    <li>
                        Plaquita conmemoratoria con huella de la mascota impresa entrega a domicilio: $ 8.000 + IVA
                    </li>
                    <li>
                        Llavero conmemoratorio con huella de la mascota impresa entrega a domicilio: $ 5.000 + IVA
                    </li>
                    <li>
                        Para más información llamar al: +569 25812345
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="pt-4 pb-5"></div>

@endsection