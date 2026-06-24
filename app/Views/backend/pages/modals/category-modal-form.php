<div class="modal fade" id="category-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" class="modal-content" action="<?= route_to('add-category')?>" id="add_category_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Large modal
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
                    <div class="form-group">
                        <label for=""><strong>Nombre de Categoria</strong></label>
                        <input type="text" class="form-control" name="category_name" placeholder="Ingrese el nombre de Categoria">
                        <span class="text-danger error-text category_name_error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary action">
                        Guardar
                    </button>
                </div>
            </div>
        </form>        
    </div>
</div>