@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>LISTA DE EQUIPOS DE TRABAJO</h1><br>
@stop


@section('content')

    <table id="setarticulos" class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID </th>
                <th scope="col">IP </th>
                <th scope="col">Codigo</th>
                <th scope="col">Sede</th>
                <th scope="col">Piso </th>
                <th scope="col">Sector </th>
                <th scope="col">Puesto </th>
                <th scope="col">Responsable</th>
                <th scope="col">Dni</th>

                <th scope="col">Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            
            {{-- @foreach ($setarticulos as $setarticulo)
                <tr>

                    <td>{{ $setarticulo->id }}</td>
                    <td>{{ $setarticulo->ip }}</td>
                    <td>{{ $setarticulo->codigo }}</td>
                    <td>{{ $setarticulo->sede }}</td>
                    <td>{{ $setarticulo->piso }}</td>
                    <td>{{ $setarticulo->sector }}</td>
                    <td>{{ $setarticulo->puesto }}</td>
                    <td>{{ $setarticulo->responsable }}</td>
                    <td>{{ $setarticulo->dni }}</td>
                    <td>{{ $setarticulo->estado }}</td>
                   



                    <td>



                        <a href="/setarticulos/{{ $setarticulo->id }}/edit" class="btn btn-primary"><i
                                class="far fa-edit"></i></a>
                                <a href="/setarticulos/{{ $setarticulo->id }}/{{$gabinete->id}}/editcart" class="btn btn-secondary"><i
                                    class="fa fa-shopping-cart"></i></a>
                        @can('articulo.show')
                            <a href="{{ route('setarticulos.show', $setarticulo->id) }}" class="btn btn-info"><i
                                    class="fas fa-info-circle"></i></a>
                        @endcan
                        @can('setarticulo.edit')
                        <a href="/setarticulos/{{$setarticulo->id}}/edit" class="btn btn-primary" ><i class="far fa-edit"></i></a>
                        @endcan
                        
                        <form action="{{ route('setarticulos.destroy', $setarticulo->id) }}" class="formulario-eliminar"
                            method="POST">

                            @csrf
                            @method('DELETE')
                            @can('articulo.destroy')
                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            @endcan


                        </form>


                    </td>
                </tr>
            @endforeach --}}


            @foreach ($setarticulos as $key => $setarticulo)
    <tr>
        <td>{{ $setarticulo->id }}</td>
        <td>{{ $setarticulo->ip }}</td>
        <td>{{ $setarticulo->codigo }}</td>
        <td>{{ $setarticulo->sede }}</td>
        <td>{{ $setarticulo->piso }}</td>
        <td>{{ $setarticulo->sector }}</td>
        <td>{{ $setarticulo->puesto }}</td>
        <td>{{ $setarticulo->responsable }}</td>
        <td>{{ $setarticulo->dni }}</td>
        <td>{{ $setarticulo->estado }}</td>
        <td>
            <a href="/setarticulos/{{ $setarticulo->id }}/edit" class="btn btn-primary"><i class="far fa-edit"></i></a>
            {{-- <a href="/setarticulos/{{ $setarticulo->id }}/{{ $gabinetes[$key]->id }}/editcart" class="btn btn-secondary"><i class="fa fa-shopping-cart"></i></a> --}}
            
            <a href="/setarticulos/{{ $setarticulo->id }}/{{ isset($gabinetes[$key]) ? $gabinetes[$key]->id : '' }}/editcart" class="btn btn-secondary"><i class="fa fa-shopping-cart"></i></a>
            {{-- <a href="/setarticulos/{{ $setarticulo->id }}/{{ isset($gabinetes[$key]) ? $gabinetes[$key]->id . '/editcart' : 'editcart' }}" class="btn btn-secondary"><i class="fa fa-shopping-cart"></i></a> --}}

            @can('articulo.show')
            <a href="{{ route('setarticulos.show', $setarticulo->id) }}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
            @endcan
            @can('setarticulo.edit')
            <a href="/setarticulos/{{$setarticulo->id}}/edit" class="btn btn-primary" ><i class="far fa-edit"></i></a>
            @endcan

            <form action="{{ route('setarticulos.destroy', $setarticulo->id) }}" class="formulario-eliminar" method="POST">
                @csrf
                @method('DELETE')
                @can('articulo.destroy')
                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                @endcan
            </form>
        </td>
    </tr>
@endforeach

        
        
        
        
        
        















            <a href="{{ route('setarticulo.impresion2') }}" class="btn btn-success mb-3"> Seleccionar Etiquetas</a>


        </tbody>



    </table>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    </-- Datatable responsive -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">


@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </-- Para usar los botones -->
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

    </-- Para los estilos de excel -->
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.5/js/buttons.html5.styles.min.js">
    </script>
    <script
        src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.5/js/buttons.html5.styles.templates.min.js">
    </script>

    </-- Datatable responsive -->
    <script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#setarticulos').DataTable({
                responsive: true,
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ],
                dom: "lBfrtip",
                buttons: {
                    dom: {
                        button: {
                            clasName: 'btn'
                        }
                    },
                    buttons: [{
                            extend: "excel",
                            text: 'Exportar a Excel',
                            className: 'btn btn-outline-success',
                            excelStyles: {
                                template: 'blue_medium'
                            }

                        }
                        /*{
                            extend: "pdf",
                            text: 'Exportar a PDF',
                            className: 'btn btn-danger'
                            btn-outline-success

                        }*/

                    ]
                }
            });
            new $.fn.dataTable.FixedHeader(table);
        });
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El registro se elimino con exito.',
                'success'
            )
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡Este registro se eliminara definitivamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            })
        });
    </script>
@stop
