@extends ('welcome')
@section('contenido')

<div class="x_panel">
    <div class="clearfix"></div>

    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>

    <div class="x_title">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h2>Listado de personas </h2>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12" align="right">
            <a href="{{ url('persona/create') }}"><button class="btn btn-info float-right"> <i class="fa fa-plus"></i> Nuevo</button></a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="clearfix"></div>



    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if ($personas->count() > 0)
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Municipio</th>
                        <th>Departamento</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personas as $obj)
                    <tr>
                        <td align="center">{{ $obj->Id }}</td>
                        <td>{{ $obj->Nombre }}</td>
                        <td>{{ $obj->Apellido }}</td>
                        <td>{{ $obj->Telefono }}</td>
                        <td>{{ $obj->municipios->Nombre }}</td>
                        <td>{{ $obj->municipios->departamentos->Nombre }}</td>

                        <td align="center">
                            <a href="{{ url('persona') }}/{{$obj->Id}}/edit" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                            &nbsp;&nbsp;
                            <a href="" data-target="#modal-delete-{{ $obj->Id }}" data-toggle="modal"><i class="fa fa-trash"></i></a>

                        </td>
                    </tr>
                    @include('persona.modal')
                    @endforeach
                </tbody>
            </table>

            <div class="clearfix"></div>
            @endif
        </div>

        @include('sweet::alert')

    </div>


</div>




@endsection
