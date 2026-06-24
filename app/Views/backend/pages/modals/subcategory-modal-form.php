<div class="modal fade" id="sub-category-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" class="modal-content" action="<?= route_to('add-subcategory')?>" id="add_subcategory_form">
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
                        <label for=""><strong>Categoria Principal</strong></label>
                       <select name="parent_cat" id="" class="form-control">
                        <option value="">Sin Categoria</option>
                       </select>
                        <span class="text-danger error-text category_name_error"></span>
                    </div>

                    <div class="form-group">
                        <label for=""><strong>Nombre de Sub Categoria</strong></label>
                        <input type="text" class="form-control" name="subcategory_name" placeholder="Ingrese el nombre de Sub Categoria">
                        <span class="text-danger error-text subcategory_name_error"></span>
                    </div>

                    <div class="form-group">
                        <label for=""><strong>Descripcion</strong></label>
                        <textarea class="form-control" name="subcategory_description" placeholder="Ingrese su descripcion" id="subcategory_description" cols="30" rows="10"></textarea>
                        <span class="text-danger error-text subcategory_description_error"></span>
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