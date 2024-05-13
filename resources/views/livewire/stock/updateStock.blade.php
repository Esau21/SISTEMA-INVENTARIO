<!-- Modal -->
<div class="modal fade" id="stockUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Stock : {{$producto}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div action="#">
            @csrf
            <div class="form-row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" value="{{$stock}}" min="0" step="1" class="form-control" placeholder="Stock" wire:model.lazy="stock">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="">Stock Minimo</label>
                        <input type="number" value="{{$stock_min}}" min="0" step="1" class="form-control" placeholder="Stock" wire:model.lazy="stock_min">
                    </div>
                </div>
            </div>
            <button type="button" wire:click="update()" class="btn btn-outline-success">Actualizar</button>
        </div>
        </div>
      </div>
    </div>
  </div>