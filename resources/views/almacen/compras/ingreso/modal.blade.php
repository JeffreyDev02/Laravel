<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="1" id="modal-delete-{{$ing -> idingreso}}">
    {{ Form::open(array('route' => ['ingreso.destroy', $ing ->idingreso], 'method'=> 'DELETE')) }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="true">
                        <span arian-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">Cancelar ingreso</h4>
                </div>
                <div class="modal-body">
                    <p>Confirme Si desea cancelar el ingreso almacén</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>    
    {{ Form::close() }}
</div>