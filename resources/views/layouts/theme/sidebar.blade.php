<div class="sidebar-wrapper sidebar-theme">

    <nav id="compactSidebar">
        <ul class="menu-categories">
            <li class="active">
                <a href="{{ url('categories') }}" class="menu-toggle" data-active="true">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-project-diagram fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">CATEGORIAS</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a href="{{ url('cotizaciones') }}" class="menu-toggle" data-active="true">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-hand-holding-usd fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">SERVICIOS</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a href="{{ url('maquinarias') }}" class="menu-toggle" data-active="true">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-tractor fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">MAQUINARIA</span>
                    </div>
                </a>
            </li>

            {{-- @endcan --}}

            <!--Productos-->
            <li class="">
                <a href="{{ url('products') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-shopping-bag fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">PRODUCTOS</span>
                    </div>
                </a>
            </li>

            <!--Stock-->
            <li class="">
                <a href="{{ url('stock') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-cubes fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">Stock</span>
                    </div>
                </a>
            </li>

            <!--ventas-->
            <li class=" ">
                <a href="{{ url('pos') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-dollar-sign fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">VENTAS</span>
                    </div>
                </a>
            </li>

            <!--Roles-->
            <li class=" ">
                <a href="{{ url('roles') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-key fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">ROLES</span>
                    </div>
                </a>
            </li>

            <!--Permisos-->
            <li class=" ">
                <a href="{{ url('permisos') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-check-square fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">PERMISOS</span>
                    </div>
                </a>
            </li>

            <!--Asignar-->
            <li class=" ">
                <a href="{{ url('asignar') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-eye fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">ASIGNAR</span>
                    </div>
                </a>
            </li>

            <!--Usuarios-->
            <li class=" ">
                <a href="{{ url('users') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-users fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">USUARIOS</span>
                    </div>
                </a>
            </li>

            <!--clientes-->
            <li class=" ">
                <a href="{{ url('clientes') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-user fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">CLIENTES</span>
                    </div>
                </a>
            </li>
            <!--Monedas-->
            <li class=" ">
                <a href="{{ url('coins') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-coins fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">MONEDAS</span>
                    </div>
                </a>
            </li>

            <!--arqueos/cierre de caja-->
            <li class=" ">
                <a href="{{ url('cashout') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-balance-scale fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">ARQUEO</span>
                    </div>
                </a>
            </li>
            <!--Reportes-->
            <li class=" ">
                <a href="{{ url('reports') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-chart-line fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">REPORTES</span>
                    </div>
                </a>
            </li>
            <li class=" ">
                <a href="{{ url('reportesmaquinarias') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-file-download fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">MAQUINARIAS | R</span>
                    </div>
                </a>
            </li>
            <li class=" ">
                <a href="{{ url('reportsservices') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-folder fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">SERVICES REPORTS</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a href="{{ url('graficos') }}" class="menu-toggle" data-active="true">
                    <div class="base-menu">
                        <div class="base-icons">
                            <i class="fas fa-tachometer-alt fa-3x" style="color: #243A73"></i>
                        </div>
                        <span class="text-white">DASHBORAD</span>
                    </div>
                </a>
            </li>
        </ul>

    </nav>
    <div id="compact_submenuSidebar" class="submenu-sidebar"></div>

</div>
