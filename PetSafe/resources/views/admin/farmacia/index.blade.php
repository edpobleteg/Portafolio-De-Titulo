@extends('layouts.layout-admin')
@section('title') Farmacias @endsection
@section('CSS')
<!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!--Responsive-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="app-body-main-content">
    <div class="section-title mb-5 mt-2">    
        <h1 class="f-size-lg">Farmacia Municipal</h1>
        <div class="hline"></div>
    </div>
    <div class="btn-component">
        <a href="{{ route('admin.medicine.create') }}" class="btn-simple-component">Añadir Nuevo <i class="fa-solid fa-plus"></i></a>
    </div>
    <table id="tabla-farmacia" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Principio Activo</th>
                <th>Función</th>
                <th>Aplicación</th>
                <th>Laboratorio</th>
                {{-- <th>Especie</th> --}}
                <th>Valor con descuento</th>
                <th>Descuento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicines as $medicine)
                <tr>
                    <td>{{ $medicine->id }}</td>
                    <td>{{ $medicine->name }}</td>
                    <td>{{ $medicine->activeSubstance }}</td>
                    <td>{{ $medicine->function }}</td>
                    <td>{{ $medicine->implementation }}</td>
                    <td>{{ $medicine->laboratory }}</td>
                    <td>{{ $medicine->price }}</td>
                    <td>{{ $medicine->discount }}%</td>
                    <td>
                        <div class="acciones-box">
                            <div class="box-editar">
                                <a href="{{ route('admin.medicine.edit', $medicine) }}"><button data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="fa-solid fa-pencil"></i></button></a>
                            </div>
                            <div class="box-eliminar">
                                <form action="{{ route('admin.medicine.destroy', $medicine) }}" method="POST" class="formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Principio Activo</th>
                <th>Función</th>
                <th>Aplicación</th>
                <th>Laboratorio</th>
                {{-- <th>Especie</th> --}}
                <th>Valor con descuento</th>
                <th>Descuento</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('JS')
    <!--DataTables-->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <!--responsive-->
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#tabla-farmacia').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@endsection