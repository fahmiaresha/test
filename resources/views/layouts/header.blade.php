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
                        style="height: 28px;"
                        alt="Logo Kemiri Water Solution"
                    >
                    <span
                        class="text-white ml-2"
                        style="font-size: 1em; font-weight: bold;"
                    >
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

                    <li class="nav-item dropdown d-none d-md-block">
                        <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                            <i class="maximize material-icons">fullscreen</i>
                            <i class="minimize material-icons">fullscreen_exit</i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link nav-link-notify" title="Pesan" data-sidebar-target="#chat-list">
                            <i class="material-icons">chat_bubble</i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link nav-link-notify" title="Notifications" data-toggle="dropdown">
                            <i class="material-icons">notifications</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div
                                class="border-bottom px-4 py-3 text-center d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Notifications</h5>
                                <small class="opacity-7">2   unread notifications</small>
                            </div>
                            <div class="dropdown-scroll">
                                <ul class="list-group list-group-flush">
                                    <li class="px-4 py-2 text-center small text-muted bg-light">Today</li>
                                    <li class="px-4 py-3 list-group-item">
                                        <a href="#" class="d-flex align-items-center hide-show-toggler">
                                            <div class="flex-shrink-0">
                                                <figure class="avatar mr-3">
                                                    <span
                                                        class="avatar-title bg-info-bright text-info rounded-circle">
                                                        <i class="ti-lock"></i>
                                                    </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    2 steps verification
                                                    <i title="Mark as read" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">20 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px-4 py-3 list-group-item">
                                        <a href="#" class="d-flex align-items-center hide-show-toggler">
                                            <div class="flex-shrink-0">
                                                <figure class="avatar mr-3">
                                                    <span
                                                        class="avatar-title bg-warning-bright text-warning rounded-circle">
                                                        <i class="ti-server"></i>
                                                    </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Storage is running low!
                                                    <i title="Mark as read" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">45 sec ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px-4 py-2 text-center small text-muted bg-light">Old Notifications</li>
                                    <li class="px-4 py-3 list-group-item">
                                        <a href="#" class="d-flex align-items-center hide-show-toggler">
                                            <div class="flex-shrink-0">
                                                <figure class="avatar mr-3">
                                                    <span class="avatar-title bg-secondary-bright text-secondary rounded-circle">
                                                        <i class="ti-file"></i>
                                                    </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    1 person sent a file
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">Yesterday</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px-4 py-3 list-group-item">
                                        <a href="#" class="d-flex align-items-center hide-show-toggler">
                                            <div class="flex-shrink-0">
                                                <figure class="avatar mr-3">
                                                    <span class="avatar-title bg-success-bright text-success rounded-circle">
                                                        <i class="ti-download"></i>
                                                    </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Reports ready to download
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">Yesterday</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="px-4 py-3 list-group-item">
                                        <a href="#" class="d-flex align-items-center hide-show-toggler">
                                            <div class="flex-shrink-0">
                                                <figure class="avatar mr-3">
                                                    <span class="avatar-title bg-primary-bright text-primary rounded-circle">
                                                        <i class="ti-arrow-top-right"></i>
                                                    </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    The invitation has been sent.
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">Last Week</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-4 py-3 text-right border-top">
                                <ul class="list-inline small">
                                    <li class="list-inline-item mb-0">
                                        <a href="#">Mark All Read</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                            <figure class="avatar avatar-sm">
                                <img src="{{ asset('/assets/gogi/assets/media/image/user/man_avatar3.jpg') }}"
                                     class="rounded-circle"
                                     alt="avatar">
                            </figure>
                            <span class="ml-2 d-sm-inline d-none">Nama User</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="text-center py-4">
                                <figure class="avatar avatar-lg mb-3 border-0">
                                    <img src="{{ asset('/assets/gogi/assets/media/image/user/man_avatar3.jpg') }}"
                                         class="rounded-circle" alt="image">
                                </figure>
                                <h5 class="text-center">Nama User</h5>
                                <div class="mb-3 small text-center text-muted">OWNER</div>
                            </div>
                            <div class="list-group">
                                <a href="" class="list-group-item">
                                    <i class="fas fa-user mr-1"></i>
                                    Profil Saya
                                </a>
                                <a href="" class="list-group-item text-danger"
                                   data-sidebar-target="#settings">
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