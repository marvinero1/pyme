@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row ">
        <div class="col">
            <div class="card">
                <form action="{{route('credito.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group mb-3 mt-3 container">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"> Empresa</label>
                        </div>
                        <select class="custom-select" name="empresas_id" data-live-search="true" required>
                            @foreach ($empresa as $empresas)
                            <option selected>Seleccione Empresa</option>
                            <option value="{{ $empresas->id }}">{{$empresas->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row container">
                        <div class="col-md-6">
                            <label><strong>Monto Solicitado</strong></label>
                            <input type="number" class="form-control" placeholder="Monto" name="monto_solicitado"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label><strong>Interes</strong></label>
                            <input type="number" class="form-control" placeholder="Interes" name="interes" required>
                        </div>
                    </div><br>
                    <div class="row container">
                        <div class="col-md-6">
                            <label><strong>Valucion Garantia *</strong></label>
                            <input type="number" class="form-control" placeholder="Valucion en efectivo"
                                name="monto_valuacion" required>
                        </div>
                        <div class="col-md-6">
                            <label><strong>Descripción Valuacion Garantia</strong></label>
                            <textarea type="text" class="form-control" placeholder="Descripción"
                                name="descripcion_valucion"></textarea>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="col-md-6">
                            <label><strong>Salud Financiera</strong></label>
                            <input type="number" class="form-control" placeholder="Anota el promedio de la empresa"
                                name="promedio">
                        </div>
                        <div class="col-md-6">
                            <br>
                            <div style="float: right;">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    &nbsp;Guardar</button>
                            </div>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="col-md-12"><br>

                        </div>
                    </div><br>
                </form>
            </div>
        </div><br>
        <div class="col">
            <div class="card container ">
                <h2 style="text-align: center;"><strong>Fórmula</strong></h2>
                <h3><strong>Salud Financiera (SF)</strong></h3>
                <p style="text-align: justify;">Si la empresa solicitante obtuvo una buena gestion
                    ((Promedio gestion pasada)) pasado,
                    se la considera optima, ya que es muy probable un pago del
                    credito solicitado.</p><br>

                <h3><strong>Valuacion Garantia (VG)</strong></h3>
                <p style="text-align: justify;">Que su valuacion de la garantia ya sea persona u objeto
                    sea mayor al credito solicitado.</p><br>

                <h3><strong>Método Basado en Calificaciones Internas</strong></h3>
                <p style="text-align: justify;">
                    Bajo un esquema de calificaciones internas, se deben calcular los
                    componentes del riesgo de una determinada operación y cuantificar el
                    requerimiento de capital y previsiones correspondientes a esa exposición.
                    Estos cálculos deberán ser realizados mediante la utilización de
                    información interna de cada entidad, debidamente validada.</p>

                <h3><strong>Calificacion = VG + SF > PrestamoSolicitado</strong></h3>
            </div>
        </div><br>
    </div><br>
</div><br>

<div class="container">
    <div class="col">
        @foreach ($credito as $creditos)
           <div class="row">
            {{-- <div class="col-md-2">
                <input type="text" name="" id="" class="form-control" disabled="true" value="">
            </div> = --}}
            <div class="col-md-4">
                <label>Monto de Valuación Garante</label>
                <input type="text" id="monto_valuacion" class="form-control" disabled="true" value="{{ $creditos->monto_valuacion }}">
            </div><strong>+</strong>

            <div class="col-md-3">
                <label>Salud Financiera</label>
                <input type="text" id="promedio" disabled="true" class="form-control" value="{{ $creditos->promedio }}">
            </div><strong>></strong>
            <div class="col-md-4">
                <label>Monto de Prestamo Solicitado</label>
                <input type="text" id="monto_solicitado" disabled="true" class="form-control" value="{{ $creditos->monto_solicitado }}">
            </div>
        </div> <br>
        <div class="col-md-12">
            <button class="btn btn-primary" onclick="scoring()">Calcular</button>
        </div>
        @endforeach
    </div>
</div><br>


<div class="col">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    {{--  <th>Id</th>  --}}
                    <th style="text-align:center;">Nombre Empresa</th>
                    <th style="text-align:center;">Rubro</th>
                    <th style="text-align:center;">NIT</th>
                    <th style="text-align:center;">Dirección</th>
                    <th style="text-align:center;">Año Gestion</th>
                    <th style="text-align:center;">Ingreso Enero</th>
                    <th style="text-align:center;">Ingreso Febrero</th>
                    <th style="text-align:center;">Ingreso Marzo</th>
                    <th style="text-align:center;">Ingreso Abril</th>
                    <th style="text-align:center;">Ingreso Mayo</th>
                    <th style="text-align:center;">Ingreso Junio</th>
                    <th style="text-align:center;">Ingreso Julio</th>

                    <th style="text-align:center;">Ingreso Agosto</th>
                    <th style="text-align:center;">Ingreso Septiembre</th>
                    <th style="text-align:center;">Ingreso Octubre</th>
                    <th style="text-align:center;">Ingreso Noviembre</th>
                    <th style="text-align:center;">Ingreso Diciembre</th>

                    <th style="text-align:center;">Promedio de Ingreso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresa as $empresas)
                <tr>
                    {{-- <td style="text-align:center;">{{ $empresas->id }}</td> --}}
                    <td style="text-align:center;">{{ $empresas->nombre }}</td>
                    <td style="text-align:center;">{{ $empresas->rubro }}</td>
                    <td style="text-align:center;">{{ $empresas->nit }}</td>
                    <td style="text-align:center;">{{ $empresas->direccion }}</td>
                    <td style="text-align:center;">{{ $empresas->año_gestion }}</td>
                    <td style="text-align:center;" id="enero">{{ $empresas->ingreso_enero }} Bs.</td>
                    <td style="text-align:center;" id="febrero">{{ $empresas->ingreso_febrero }} Bs.</td>
                    <td style="text-align:center;" id="marzo">{{ $empresas->ingreso_marzo }} Bs.</td>
                    <td style="text-align:center;" id="abril">{{ $empresas->ingreso_abril }} Bs.</td>
                    <td style="text-align:center;" id="mayo">{{ $empresas->ingreso_mayo }} Bs.</td>
                    <td style="text-align:center;" id="junio">{{ $empresas->ingreso_junio }} Bs.</td>
                    <td style="text-align:center;" id="julio">{{ $empresas->ingreso_julio }} Bs.</td>
                    <td style="text-align:center;" id="agosto">{{ $empresas->ingreso_agosto }} Bs.</td>
                    <td style="text-align:center;" id="septiembre">{{ $empresas->ingreso_septiembre }} Bs.</td>
                    <td style="text-align:center;" id="octubre">{{ $empresas->ingreso_octubre }} Bs.</td>
                    <td style="text-align:center;" id="noviembre">{{ $empresas->ingreso_noviembre }} Bs.</td>
                    <td style="text-align:center;" id="diciembre">{{ $empresas->ingreso_diciembre }} Bs.</td>
                    <td style="text-align:center;"><input type="button" value="Sacar Salud Financiera"
                            onclick="promedio()"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
<script type="text/javascript">
    function promedio() {

        var meses = 12;
        var enero = parseInt(document.getElementById('enero').innerHTML);
        var febrero = parseInt(document.getElementById('febrero').innerHTML);
        var marzo = parseInt(document.getElementById('marzo').innerHTML);
        var abril = parseInt(document.getElementById('abril').innerHTML);
        var mayo = parseInt(document.getElementById('mayo').innerHTML);
        var junio = parseInt(document.getElementById('junio').innerHTML);
        var julio = parseInt(document.getElementById('julio').innerHTML);
        var agosto = parseInt(document.getElementById('agosto').innerHTML);
        var septiembre = parseInt(document.getElementById('septiembre').innerHTML);
        var octubre = parseInt(document.getElementById('octubre').innerHTML);
        var noviembre = parseInt(document.getElementById('noviembre').innerHTML);
        var diciembre = parseInt(document.getElementById('diciembre').innerHTML);

        promedio = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre +
            diciembre;

        promedioFinal = promedio / meses;
        alert('El promedio de ingreso de la empresa por año es:' + promedioFinal);
    }


    function scoring(){
        var monto_valuacion = parseInt(document.getElementById('monto_valuacion').value);
        var promedio = parseInt(document.getElementById('promedio').value);
        var monto_solicitado = parseInt(document.getElementById('monto_solicitado').value);
    

        total = monto_valuacion + promedio;
       
        if(total > monto_solicitado){
            alert('Calculando la salud financiera como tambien la valuacion del garante, SI obtuvo una buena calificacion para el prestamo de :' + monto_solicitado);
        }else{
            alert('Calculando la salud financiera como tambien la valuacion del garante, NO se obtuvo una buena calificacion para el prestamo de :' + monto_solicitado);
        }
    }
</script>
