@include('commom.modalHead')


<div class="row">
    {{-- Esto es el input para el nombre --}}
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="ej:Edgar" >
            @error('name')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

    {{-- Esto es el input para el  telefono--}}
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Telefono</label>
            <input type="text" wire:model.lazy="phone" class="form-control" placeholder="ej: 7281-4956" maxlength="10" >
            @error('phone')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

    {{-- Esto es el input para el Email --}}
    <div class="col-sm-8">
        <div class="input-group p-2">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fas fa-envelope">
                        Email
                    </span>
                </span>
            </div>
            <input type="text" wire:model.lazy="email" class="form-control" placeholder="ej: edgar123@gmail.com">
        </div>
        @error('email') <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

       {{-- Esto es el input para la clave --}}
       <div class="col-sm-8">
        <div class="input-group p-2">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fas fa-key">
                        Clave
                    </span>
                </span>
            </div>
            <input type="password" wire:model.lazy="password" class="form-control">
        </div>
        @error('password') <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

      {{-- Esto es el input para el Estado --}}
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Estado</label>
            <select wire:model.lazy="status" class="form-control">
                <option value="Elegir" selected>Elegir</option>
                <option value="Active" selected>Activado</option>
                <option value="Locked" selected>Bloqueado</option>
            </select>
            @error('status')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

     {{-- Esto es el input para el Role --}}
     <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Asignar Role</label>
            <select wire:model.lazy="profile" class="form-control">
                <option value="Elegir" selected>Elegir</option>
                @foreach($roles as $role)
                <option value="{{$role->name}}" selected>{{$role->name}}</option>
                @endforeach
            </select>
            @error('profile')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

      {{-- Esto es el input para la parte de la imagen --}}
      <div class="col-sm-12">
        <div class="form-group">
            <label>Imagen de perfil</label>
            <input type="file" class="form-control" wire:model="image"
            accept="image/x-png, image/gif, image/jpeg"
            >
            @error('image')
                <span class="text-danger er">{{ $message}}</span>
            @enderror
        </div>
    </div>

     

</div>

@include('commom.modalFooter')
