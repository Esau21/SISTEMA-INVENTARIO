<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('scan-ok', Msg => {
            noty(Msg)
        });

        window.livewire.on('err-type_docs',Msg =>{
            noty(Msg)
        })

        window.livewire.on('err-empty', Msg => {
            noty(Msg);
        })

        window.livewire.on('scan-es', Msg => {
            noty(Msg)
        });

        window.livewire.on('scan-notfound', Msg => {
            noty(Msg, 2)
        });

        window.livewire.on('no-stock', Msg => {
            noty(Msg, 2)
        });

        window.livewire.on('sale-error', Msg => {
            noty(Msg)
        });

        window.livewire.on('sale-ok', Msg => {
            noty(Msg)
        });

        /* window.livewire.on('print-ticket', saleId => {
            window.open('/print-ticket/' + saleId);
        }); */

    });
</script>
