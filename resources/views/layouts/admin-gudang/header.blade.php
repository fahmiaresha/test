<div class="header d-print-none">
    <div class="header-container">
        <div class="header-left">
            <div class="navigation-toggler">
                <a href="#" data-action="navigation-toggler">
                    <i data-feather="menu"></i>
                </a>
            </div>

            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('/assets/img/logo-kemiri.png') }}"
                        class="logo"
                        alt="Logo Kemiri Water Solution"
                    >
                    <span class="text-white ml-2">
                        KEMIRI WATER SOLUTION
                    </span>
                </a>
            </div>
        </div>

        <div class="header-body">
            <div class="header-body-left">
                <ul class="navbar-nav">
                    <li class="nav-item mr-3">
                    </li>
                </ul>
            </div>

            <div class="header-body-right">
                <ul class="navbar-nav">
                @php $data = Auth::user()->admin_gudang(Auth::user()->ID_USER); @endphp
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                            @if(Auth::user()->FOTO_PROFILE == null)
                            <figure class="avatar avatar-sm">
                                <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}"
                                     class="rounded-circle"
                                     alt="avatar">
                            </figure>
                            @else
                            <figure class="avatar avatar-sm">
                                <img src="{{ asset(Auth::user()->FOTO_PROFILE) }}"
                                     class="rounded-circle"
                                     alt="avatar">
                            </figure>
                            @endif
                            
                            <span class="ml-2 d-sm-inline d-none">{{ $data->NAMA_ADMIN_GUDANG }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="text-center py-4">
                                @if(Auth::user()->FOTO_PROFILE == null)
                                <figure class="avatar avatar-lg mb-3 border-0">
                                        <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle" alt="image">
                                </figure>
                                @else
                                <figure class="avatar avatar-lg mb-3 border-0">
                                    <img src="{{ asset(Auth::user()->FOTO_PROFILE) }}" class="rounded-circle" alt="image">
                                </figure>
                                @endif
                                <h5 class="text-center">{{ $data->NAMA_ADMIN_GUDANG }}</h5>
                                <div class="mb-3 small text-center text-muted">ADMIN GUDANG</div>
                            </div>
                            <div class="list-group">
                                <a href="" class="list-group-item" data-toggle="modal" data-target="#modal-profile">
                                    <i class="fas fa-user mr-1"></i>
                                    Profil Saya
                                </a>
                                <a href="{{ route('logout') }}" class="list-group-item text-danger">
                                   <i class="fas fa-sign-out-alt mr-1"></i>
                                   Logout
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item header-toggler">
                <a href="#" class="nav-link">
                    <i data-feather="arrow-down"></i>
                </a>
            </li>
        </ul>
    </div>
</div>