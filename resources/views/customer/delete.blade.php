<!-- HIDDEN SIGNUP MODAL -->
    <div class="modal fade" id="modal-delete-customer">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header background-danger text-white text-center">
                    <h3>Eliminar Cliente?</h3>
                </div><!-- modal-header -->
                <div class="modal-body">
                    <p><strong>Deseas eliminar a:</strong> @{{ myData.nombre }}</p>
                    <form @submit.prevent="onSubmitFormDelete">
                        <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal">Eliminar</button>
                        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Cerrar</button>
                    </form>
                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- .modal-dialogo modal-sm -->
    </div><!-- .modal fade #modal-signup -->
    <!-- END HIDDEN SIGNUP MODAL -->
