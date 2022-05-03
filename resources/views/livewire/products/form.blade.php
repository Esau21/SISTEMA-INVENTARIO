@include('commom.modalHead')


<div class="row">
    {{-- Esto es el input para el nombre --}}
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="ej:Cursos" >
            @error('name')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

    {{-- Esto es el input para el codigo de barras --}}
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Codigo</label>
            <input type="text" wire:model.lazy="barcode" class="form-control" placeholder="ej:000967" >
            @error('barcode')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

    {{-- Esto es el input para el codigo de Costo --}}
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Costo</label>
            <input type="text" data-type='currency' wire:model.lazy="cost" class="form-control" placeholder="ej: 0.00" >
            @error('cost')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

       {{-- Esto es el input para el codigo de Precio --}}
       <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Precio</label>
            <input type="text" data-type='currency' wire:model.lazy="price" class="form-control" placeholder="ej: 0.00" >
            @error('price')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

      {{-- Esto es el input para el Stock --}}
      <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Stock</label>
            <input type="number" wire:model.lazy="stock" class="form-control" placeholder="ej: 0" >
            @error('stock')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

      {{-- Esto es el input para el Alerts --}}
      <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Inv.min | Alertas </label>
            <input type="number" wire:model.lazy="alerts" class="form-control" placeholder="ej: 10" >
            @error('alerts')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

    {{-- Aqui hacemos el select --}}
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Categorias</label>
            <select wire:model='categoryid' class="form-control">
                <option class="text-dark" value="Elegir" disabled>Elegir</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('categoryid')
            <span class="text-danger er">{{ $message}}</span>
        @enderror
        </div>
    </div>

    {{-- Aqui hacemos para la subida de la imagen --}}
    <div class="col-sm-12 col-md-12">
        <div class="form-group custom-file">
            <input type="file" class="custom-file-input form-control" wire:model="image"
            accept="image/x-png, image/gif, image/jpeg"
            >
            <label class="custom-file-label">Imagen {{$image}}</label>
            @error('image')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

</div>

@include('commom.modalFooter')
