@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><strong>Administración Empresa</strong></h3>
                    <p>Los campos marcados con (*) son requeridos</p>
                    @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    <form action="{{route('empresa.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Nombre *</strong></label>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Rubro *</strong></label>
                                <input type="text" class="form-control" placeholder="Rubro" name="rubro" required>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Nit *</strong></label>
                                <input type="number" class="form-control" placeholder="Nit" name="nit" required>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Dirección</strong></label>
                                <input type="text" class="form-control" placeholder="Direccion" name="direccion">
                            </div>
                        </div><br>
                        <h3><strong>Salud Financiera </strong></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Año Gestion*</strong></label>
                                <input type="number" class="form-control" placeholder="Año" name="año_gestion" required>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Enero *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Enero"
                                    name="ingreso_enero" required>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Febrero *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Febrero"
                                    name="ingreso_febrero" required>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Marzo *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Marzo"
                                    name="ingreso_marzo" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Abril *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Abril"
                                    name="ingreso_abril" required>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Mayo *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Mayo" name="ingreso_mayo"
                                    required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Junio *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Junio"
                                    name="ingreso_junio" required>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Julio *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Julio"
                                    name="ingreso_julio" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Agosto *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Agosto"
                                    name="ingreso_agosto" required>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Septiembre *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Septiembre"
                                    name="ingreso_septiembre" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Octubre *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Octubre"
                                    name="ingreso_octubre" required>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Noviembre *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Noviembre"
                                    name="ingreso_noviembre" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Diciembre *</strong></label>
                                <input type="number" class="form-control" placeholder="Ingreso Diciembre"
                                    name="ingreso_diciembre" required>
                            </div><br>
                            <div class="col-md-6"><br>
                                <div style="float: right;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        &nbsp;Guardar</button>
                                </div>
                            </div>
                        </div><br>
                </div><br>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col"><br>
        <a href="{{ route('credito.index' )}}">
            <button class="btn btn-primary" style="display: block;margin: auto;">Solicitar Credito</button></a><br>
        
    </div>
</div>

@endsection