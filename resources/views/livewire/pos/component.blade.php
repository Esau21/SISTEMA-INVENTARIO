        <div>
            <style></style>



        <div class="row layout-top-spacing">

            <div class="col-sm-12 col-md-8">
            {{--  DETALLES --}}
            @include('livewire.pos.partials.detail')
            <br>
            <center>
            {{-- <a class="btn btn-outline-danger {{count($cart) <1 ? 'disabled' : '' }}"
            href="{{ url('sale/pdf' . '/' . $total . '/' . $itemsQuantity . '/' . $efectivo . '/' . $change) }}" target="_blank"><i class="fas fa-file-pdf fa-2x"></i>Imprimir ticket de Venta</> --}}
            </center>
            </div>


            <div class="col-sm-12 col-md-4">
                {{--  TOTAL --}}
                @include('livewire.pos.partials.total')



                {{--  DENOMINACIONES --}}
                @include('livewire.pos.partials.coins')
            </div>

        </div>

    </div>



    <script src="{{ asset('js/keypress.js') }}"></script>
    <script src="{{ asset('js/onscan.js') }}"></script>

        @include('livewire.pos.scripts.events')
        @include('livewire.pos.scripts.general')
        @include('livewire.pos.scripts.scan')
        @include('livewire.pos.scripts.shortcuts')
