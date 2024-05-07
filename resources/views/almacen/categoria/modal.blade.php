<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabinex="1" id="modal-delete-{{$cat -> idcategoria}}">
    {{Form::open(array('route'=> ['categoria.destroy', $cat -> idcategoria], 'method'=> 'DELETE'))}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" arial-label="true">
                        <span arian-hidden>x</span>
                    </button>
                    <h4 class="modal-title">Elimina categoria</h4>
                </div>
                <div class="modal-body">
                    <p>Confirme si desea eliminar la categoria {{$cat -> idcategoria}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    {{Form::close()}}
</div>