<div>
    <style></style>



    <div class="row layout-top-spacing">
        @include('livewire.facturacion.partials.detail')
    </div>

</div>



<script src="{{ asset('js/keypress.js') }}"></script>
<script src="{{ asset('js/onscan.js') }}"></script>

@include('livewire.pos.scripts.events')
@include('livewire.pos.scripts.general')
@include('livewire.pos.scripts.scan')
@include('livewire.pos.scripts.shortcuts')
