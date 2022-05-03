    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    {{-- <script src="{{asset('bootstrap/js/popper.min.js')}}"></script> --}}
    {{-- <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
    <script src="{{asset('plugins/nicescroll/nicescroll.min.js')}}"></script>
    <script src="{{asset('plugins/currency/currency.js')}}"></script>

    <!--Creamos un script nuevo-->
    <script>
    /** Creamos una funcion */

    function noty(Msg,option=1) /** funcion global que envia notificaciones */
    {
        Snackbar.show({
            text: Msg.toUpperCase(),
            actionText:'Cerrar',
            actionTextColor:'#fff',
            backgroundColor: option == 1 ? '#3B3F' : '#e7515a',
            pos:'top-right'
        });
    }
    </script>
  <script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
  <script src="{{asset('assets/js/authentication/form-1.js')}}"></script>
  @livewireScripts