@extends ('welcome')
@section('contenido')
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>

    <div class="x_panel">
        <div class="clearfix"></div>
        <div class="row">
            <div class="x_title">
                <h2>Modificación de personas </h2>

                <ul class="nav navbar-right panel_toolbox">

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">


                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::model($persona, ['method' => 'PATCH', 'route' => ['persona.update', $persona->Id]]) !!}
                {{ Form::token() }}
                <br />




                <div class="form-group">
                    <label class="col-sm-3 control-label">Departamento</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="Departamento" id="Departamento" class="form-control">
                            @foreach ($departamentos as $obj)
                                @if ($persona->municipios->Departamento == $obj->Id)
                                    <option value="{{ $obj->Id }}" selected>{{ $obj->Nombre }}</option>
                                @else
                                    <option value="{{ $obj->Id }}">{{ $obj->Nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <label class="col-sm-3 control-label">&nbsp;</label>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Municipio</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="Municipio" id="Municipio" required class="form-control select2" style="width:100%">
                            @foreach ($municipios as $obj)
                                @if ($persona->Municipio == $obj->Id)
                                    <option value="{{ $obj->Id }}" selected>{{ $obj->Nombre }}</option>
                                @else
                                    <option value="{{ $obj->Id }}">{{ $obj->Nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <label class="col-sm-3 control-label">&nbsp;</label>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="Nombre" class="form-control" value="{{ $persona->Nombre }}"
                            required="true" onblur="this.value = this.value.toUpperCase()">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Apellido</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="Apellido" class="form-control" required="true"
                            value="{{ $persona->Apellido }}" onblur="this.value = this.value.toUpperCase()">
                    </div>
                    <label class="col-sm-3 control-label">&nbsp;</label>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Teléfono</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="Telefono" value="{{ $persona->Telefono }}"
                            data-inputmask="'mask': ['9999-9999']" class="form-control" required="true">
                    </div>
                    <label class="col-sm-3 control-label">&nbsp;</label>
                </div>

                <div class="form-group" align="center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <a href="{{ url('persona') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
                </div>

                {!! Form::close() !!}

            </div>
            @include('sweet::alert')
        </div>
    </div>
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#Departamento").change(function() {
                // var para la Centro
                var Departamento = $(this).val();

                //funcion para las propiedades
                $.get("{{ url('municipio/combo', '') }}" + "/" + Departamento, function(data) {

                    console.log(data);
                    var _select = '<option value="">SELECCIONE</option>'
                    for (var i = 0; i < data.length; i++)
                        _select += '<option value="' + data[i].Id + '"  >' + data[i].Nombre +
                        '</option>';

                    $("#Municipio").html(_select);

                });

            });
        });
    </script>
@endsection
