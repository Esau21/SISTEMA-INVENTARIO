    <link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" /> 
    <script src="{{asset('assets/js/loader.js')}}"></script>
    
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/lux/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css') }}" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    {{-- <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/structure.css')}}" rel="stylesheet" type="text/css" class="structure" />
    <link href="{{asset('assets/css/authentication/form-1.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{asset('plugins/font-icons/fontawesome/css/fontawesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css">
    
    <link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/apps/scrumboard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/apps/notes.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/widgets/modules-widgets.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">

    <!--Creamos un style personalizado-->
    <style> 
    aside{
        display: none !important;
    }

    .page-item.active .page-link{
        z-index: 3;
        color: #fff;
        background-Color:#3b3f5c;
        border-Color: #3b3f5c;
    }

    @media(max-width: 480px)
    {
        .mtmobile{margin-bottom: 20px !important;}
        .mtmobile{margin-bottom: 10px !important;}

        .hideonsm{display: none !important;}
        .inblock{display:Block;}
    }
    /*BackGround Sidebar*/
    .sidebar-theme #compactSidebar {
    background: #FC7300 !important;
    }
    /*BackGround Sidebar Collapse*/
    .header-container .sidebarCollapse {
    color: #3b3f5c !important;
}

 /*search box background*/
 .navbar .navbar-item .nav-item form.form-inline input.search-form-control {
    font-size: 15px;
    background-color: #ffffff !important;
    padding-right: 40px;
    padding-top: 12px;
    border: none;
    color: #3B3F;
    box-shadow: none;
    border-radius: 30px;
}

.navbar {
    padding: 0 0 0 20px;
    background: #ffffff;
    min-height: 80px;
    border-bottom: 1px solid #3b3f;
    -webkit-transition: .3s ease all;
    transition: .3s ease all;
    -webkit-box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
    -moz-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
    box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
}
    </style>
<link rel="stylesheet" type="text/css" href="{{asset('plugins/flatpickr/flatpickr.dark.css')}}">
@livewireStyles
   