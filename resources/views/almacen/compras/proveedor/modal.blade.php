<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="1" id="modal-delete-{{$persona -> idpersona}}">
    {{ Form::open(array('route' => ['persona.destroy', $persona ->idpersona], 'method'=> 'DELETE')) }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="true">
                        <span arian-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">Eliminar Cliente</h4>
                </div>
                <div class="modal-body">
                    <p>Confirme Si desea eliminar el cliente {{$persona -> idpersona }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>    
    {{ Form::close() }}
</div>