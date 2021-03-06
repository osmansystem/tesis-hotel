@extends('layouts.app')
@section('title', 'Presupuesto')
@section('style')
    {!! Html::style('css/bootstrap-datepicker.min.css') !!}
    {!! Html::style('css/bootstrap-timepicker.min.css') !!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') !!}
@endsection
@section('title-section','Gestionar Presupuesto')
@section('content')

<div class="container">
    <div class="row well">

        <!-- *** INFO CLIENTE START *** -->
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Cliente</h3>
                </div><!-- .panel-heading -->
              <div class="panel-body">
                  <div class="col-md-6">
                      <div class="buscarCliente">
                          <form class="form-horizontal">
                              <div class="form-group">
                                  <label for="" class="control-label col-md-4">Cedula/Rif:</label>
                                  <div class="col-md-6">
                                      <input type="text" v-model="cliente.buscar.cedula" name="" :value="cliente.buscar.cedula" class="form-control">
                                  </div>
                                  <div class="col-md-2">
                                      <button type="button" @click="buscarCliente" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <div class="infoCliente form-horizontal">
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Codigo:</label>
                                <div class="col-md-8">
                                    <input type="text" disabled="disabled" :value="cliente.codigo" class="form-control">
                                </div><!-- .col-md-8 -->
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Teléfono:</label>
                                <div class="col-md-8">
                                    <input type="text" disabled="disabled" :value="cliente.telefono" class="form-control">
                                </div><!-- .col-md-8 -->
                             </div><!-- .form-group -->
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Fax:</label>
                                <div class="col-md-8">
                                    <input type="text" disabled="disabled" :value="cliente.fax" class="form-control">
                                </div><!-- .col-md-8 -->
                            </div><!-- .form-group -->
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="infoClienteExtra form-horizontal">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h3 class="panel-title">Contacto Principal</h3>
                                  </div>
                                  <div class="panel-body">
                                      <div class="form-group">
                                          <label for="" class="control-label col-md-4">Nombre:</label>
                                          <div class="col-md-8">
                                              <input type="text" disabled="disabled" :value="cliente.nombreContacto" class="form-control">
                                          </div><!-- .col-md-8 -->
                                      </div><!-- .form-group -->
                                      <div class="form-group">
                                          <label for="" class="control-label col-md-4">Cargo</label>
                                          <div class="col-md-8">
                                              <input type="text" disabled="disabled" :value="cliente.cargoContacto" class="form-control">
                                          </div><!-- .col-md-8 -->
                                      </div><!-- .form-group -->
                                      <div class="form-group">
                                          <label for="" class="control-label col-md-4">Teléfono:</label>
                                          <div class="col-md-8">
                                              <input type="text" disabled="disabled" :value="cliente.telefonoContacto" class="form-control">
                                          </div><!-- .col-md-8 -->
                                      </div><!-- .form-group -->
                                  </div>
                              </div>
                      </div>
                  </div>
              </div><!-- .panel-body -->
          </div><!-- .panel panel-default -->
        </div><!-- .col-md-8 -->
        <!-- *** INFO CLIENTE END *** -->

        <!-- *** CODIGO DE PRESUPUESTO START *** -->
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">SIGAEH</h3>
                </div>
                <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Codigo de Presupuesto:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" :value="budget.codigo" disabled="disabled">
                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Fecha de Emisión:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="date" disabled name="" :value="budget.fechaEmision">
                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Fecha de Confirmación:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="date" disabled name="" :value="budget.fechaConfirmacion">
                            </div>
                        </div><!-- .form-group -->
                </div>
            </div><!-- .panel panel-primary -->
        </div><!-- .col-md-4 -->
        <!-- *** CODIGO DE PRESUPUESTO END *** -->

        <!-- *** EVENTO START *** -->
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Evento</h3>
                </div><!-- .panel-heading -->
                <div class="panel-body">

                    <div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Tipo:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" disabled :value="budget.sectionEvento.tipo">
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Salón:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" disabled :value="budget.sectionEvento.salon">
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Hora:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" disabled :value="budget.sectionEvento.hora">
                                </div>
                            </div><!-- .form-group -->
                        </div><!-- .col-md-6 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Montaje:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" disabled :value="budget.sectionEvento.montaje">
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">N° Pax:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" disabled :value="budget.sectionEvento.nPersonas">
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Comentario:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" disabled :value="budget.sectionEvento.comentarios">
                                </div>
                            </div><!-- .form-group -->
                        </div><!-- .col-md-6 -->

                        <div class="col-md-12">
                            <p class="text-center"><strong>Fecha:</strong></p>
                            <div class="form-group">
                                <label for="" class="col-md-1">Desde:</label>
                                <div class="col-md-5">
                                    <input class="form-control" type="text" disabled name="" :value="budget.sectionEvento.fechaDesde">
                                </div>
                                <label for="" class="control-label col-md-1">Hasta:</label>
                                <div class="col-md-5">
                                    <input class="form-control" type="text" disabled name="" :value="budget.sectionEvento.fechaHasta">
                                </div>
                            </div><!-- .form-group -->
                        </div><!-- .col-md-12 -->
                    </div>

                </div><!-- .panel-body -->
            </div><!-- .panel panel-info -->
        </div><!-- .col-md-8 -->
        <!-- *** EVENTO END *** -->
        
        <!-- *** TOTAL START *** -->
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Total</h3>
                </div>
                <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Sub Total:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" disabled :value="calcularSubTotal">
                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Iva 12%:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" disabled :value="calcularIva">
                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Total General:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" disabled :value="calcularTotal">
                            </div>
                        </div><!-- .form-group -->
                </div>
            </div>
        </div><!-- .col-md-4 -->
        <!-- *** TOTAL END *** -->

        <!-- ACCIONES START -->
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-body text-center">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#cargar"><i class="fa fa-shopping-basket fa-2x"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-search fa-2x"></i></button>
                    <button class="btn btn-primary" @click="storePresupuesto" :disabled="changeDisabledBtnCreate"><i class="fa fa-save fa-2x"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-trash fa-2x"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-check-square-o fa-2x"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-envelope-o fa-2x"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-print fa-2x"></i></button>
                    <button class="btn btn-primary" @click="btnLimpiarPresupuesto" ><i class="fa fa-close fa-2x"></i></button>
                </div><!-- panel-body -->
            </div><!-- panel panel-primary -->
        </div><!-- col-md-12 -->
        <!-- ACCIONES END -->
        
        <!-- TABLA START -->
        <div class="col-md-12">
            <div class="table responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Días</th>
                            <th>Precio Unit.</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in budget.detalles">
                            <td>@{{ detalle.codigo }}</td>
                            <td>@{{ detalle.descripcion }}</td>
                            <td>@{{ detalle.cantidad }}</td>
                            <td>@{{ detalle.dias }}</td>
                            <td>@{{ detalle.precioUnit }}</td>
                            <td>@{{ detalle.total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- TABLA END -->

    </div><!-- .row -->
    <!-- MODAL START -->
    @include('presupuesto.cargar')
    <!-- MODAL END -->
    <pre>
        @{{ $data }}
    </pre>
</div><!-- .container -->

@endsection
@section('script')
    {!! Html::script('js/vue.js') !!}
    {!! Html::script('js/vue-resource.js') !!}
    {!! Html::script('js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('js/bootstrap-timepicker.min.js') !!}
    {!! Html::script('js/admin/presupuesto-vue.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') !!}
@endsection
