@extends('layouts.app')
@section('title', 'Crear Cliente')
@section('title-section','Crear Cliente')
@section('content')


<div id="cargando" class="container" v-bind:style="css.progressVisible">
    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            <span class="sr-only">Cargandoo...</span>
        </div>
    </div>
</div>

<div id="main" class="container" v-bind:style="css.mainVisible">
    <!-- Mensaje -->
    <div v-if="mostrarMensaje" v-bind:class="mensaje.type">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" @click="cerrarMensaje">&times;</button>
        @{{ mensaje.title }}.
    </div>

    <!-- Formulario para Buscar Clientes -->
    <div>
        <form class="form-horizonta well row" method="get" @submit.prevent="buscarCliente">
        <fieldset>
            <legend>Buscar Clientes</legend>
            <div>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="buscar" v-model="buscar" value="">
                </div>
                <div class="col-md-2">
                    <button v-bind:class="buttonBuscarActive? buttonBuscar.active:buttonBuscar.disabled" v-bind:type="buttonBuscarActive? buttonBuscar.submit:buttonBuscar.button" name="button">Buscar</button>
                </div>
            </div>
        </fieldset>
        </form>
    </div>

    <!-- Formulario Clientes -->
    <div>
        <div class="progress" v-bind:style="css.ajaxProcesoVisible">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="sr-only">Cargandoo...</span>
            </div>
        </div>
        <form class="form-horizonta well row" method="post" @submit.prevent="onSubmitForm" id="form">
        <fieldset>

            <legend>Datos del Clientes</legend>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cedula_rif">Cedula</label>
                    <input type="text" class="form-control" v-model="myData.cedula_rif" name="cedula_rif" value="">
                    <span v-if="formErrors['cedula_rif']" class="error text-danger">
                        @{{ formErrors['cedula_rif'] }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" v-model="myData.nombre" name="nombre" value="">
                    <span v-if="formErrors['nombre']" class="error text-danger">
                        @{{ formErrors['nombre'] }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control" v-model="myData.domicilio" name="domicilio" value="">
                    <span v-if="formErrors['domicilio']" class="error text-danger">
                        @{{ formErrors['domicilio'] }}
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input id="telefono" type="text" class="form-control" v-model="myData.telefono" name="telefono" value="" data-mask="(####) ###-####">
                    <span v-if="formErrors['telefono']" class="error text-danger">
                        @{{ formErrors['telefono'] }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input id="fax" type="text" class="form-control" v-model="myData.fax" name="fax" value="" data-mask="(####) ###-####">
                    <span v-if="formErrors['fax']" class="error text-danger">
                        @{{ formErrors['fax'] }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" v-model="myData.email" name="email" value="">
                    <span v-if="formErrors['email']" class="error text-danger">
                        @{{ formErrors['email'] }}
                    </span>
                </div>
            </div>

            <div class="col-md-12 form-group">
                <h3>Tipo de Cliente</h3>
                <label for="">No Credito: </label>
                <label class="radio-inline">
                  <input type="radio" name="tipo_cte" value="contado" v-model="myData.tipo_cte" checked> Contado
                </label>
                <br>
                <label for="">Credito: </label>
                <label class="radio-inline">
                  <input type="radio" name="tipo_cte" value="7dias" v-model="myData.tipo_cte"> 7 días
                </label>
                <label class="radio-inline">
                  <input type="radio" name="tipo_cte" value="15dias" v-model="myData.tipo_cte"> 15 días
                </label>
                <label class="radio-inline">
                  <input type="radio" name="tipo_cte" value="30dias" v-model="myData.tipo_cte"> 30 días
                </label>
                <label class="radio-inline">
                  <input type="radio" name="tipo_cte" value="45dias" v-model="myData.tipo_cte"> 45 días
                </label>
            </div>

            <legend>Información de Contacto</legend>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="contacto_c1">Contacto 1</label>
                    <input type="text" class="form-control" v-model="myData.contacto_c1" name="contacto_c1" value="">
                    <span v-if="formErrors['contacto_c1']" class="error text-danger">
                        @{{ formErrors['contacto_c1'] }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="cargo_dpto_c1">Cargo Departamento 1</label>
                    <input type="text" class="form-control" v-model="myData.cargo_dpto_c1" name="cargo_dpto_c1" value="">
                    <span v-if="formErrors['cargo_dpto_c1']" class="error text-danger">
                        @{{ formErrors['cargo_dpto_c1'] }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="telefono_c1">Teléfono 1</label>
                    <input id="telefono_c1" type="text" class="form-control" v-model="myData.telefono_c1" name="telefono_c1" value="" data-mask="(####) ###-####">
                    <span v-if="formErrors['telefono_c1']" class="error text-danger">
                        @{{ formErrors['telefono_c1'] }}
                    </span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="contacto_c2">Contacto 2</label>
                    <input type="text" class="form-control" v-model="myData.contacto_c2" name="contacto_c2" value="">
                    <span v-if="formErrors['contacto_c2']" class="error text-danger">
                        @{{ formErrors['contacto_c2'] }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="cargo_dpto_c2">Cargo Departamento 2</label>
                    <input type="text" class="form-control" v-model="myData.cargo_dpto_c2" name="cargo_dpto_c2" value="">
                    <span v-if="formErrors['cargo_dpto_c2']" class="error text-danger">
                        @{{ formErrors['cargo_dpto_c2'] }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="telefono_c2">Teléfono 2</label>
                    <input id="telefono_c2" type="text" class="form-control" v-model="myData.telefono_c2" name="telefono_c2" value="" data-mask="(####) ###-####">
                    <span v-if="formErrors['telefono_c2']" class="error text-danger">
                        @{{ formErrors['telefono_c2'] }}
                    </span>
                </div>
            </div>

            <div class="form-group col-md-12">
                <button class="btn btn-success" type="submit" name="button">Guardar</button>
                <button v-bind:class="buttonDelete.modo" type="button" data-toggle="modal" v-bind:data-target="buttonDelete.modal" name="button">Eliminar</button>
                <button class="btn btn-primary pull-right" type="button" name="button" @click="cleanData"><i class="fa fa-eraser"></i></button>
            </div>


        </fieldset>
        </form>
        <div class="progress" v-bind:style="css.ajaxProcesoVisible">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="sr-only">Cargandoo...</span>
            </div>
        </div>
    </div>

</div>
@include('customer.delete')
@endsection
@section('script')
    {!! Html::script('js/vue.js') !!}
    {!! Html::script('js/vue-resource.js') !!}
    {!! Html::script('js/admin/cliente-vue.js') !!}
    {!! Html::script('js/puremask.min.js') !!}
    <script type="text/javascript">
        PureMask.format("#telefono", true);
        PureMask.format("#fax", true);
        PureMask.format("#telefono_c1", true);
        PureMask.format("#telefono_c2", true);
    </script>
@endsection
