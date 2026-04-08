    <header class="nxl-header">
        <div class="header-wrapper">
            <!--! [Start] Header Left !-->
            <div class="header-left d-flex align-items-center gap-4">
                <!--! [Start] nxl-head-mobile-toggler !-->
                <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <!--! [Start] nxl-head-mobile-toggler !-->
                <!--! [Start] nxl-navigation-toggle !-->
                <div class="nxl-navigation-toggle">
                    <a href="javascript:void(0);" id="menu-mini-button">
                        <i class="feather-align-left"></i>
                    </a>
                    <a href="javascript:void(0);" id="menu-expend-button" style="display: none">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>
                <div class="mt-1">
                    <h2 class="fw-bolder text-uppercase shadow-sm p-2 p-md-3 rounded-3 border-start border-5 fs-4 fs-lg-2"
                        style="border-color: #f3821c !important;">

                        <span style="color: #f3821c;">LEGENDARIOS</span>

                        <span class="text-dark d-none d-md-inline">SANTA CRUZ</span>
                    </h2>
                </div>
            </div>
            <!--! [End] Header Left !-->

            <!--! [Start] Header Right !-->
            <div class="header-right ms-auto">
                <div class="d-flex align-items-center">



                    <div class="nxl-h-item dark-light-theme">
                        <a href="javascript:void(0);" class="nxl-head-link me-0 dark-button">
                            <i class="feather-moon"></i>
                        </a>
                        <a href="javascript:void(0);" class="nxl-head-link me-0 light-button" style="display: none">
                            <i class="feather-sun"></i>
                        </a>
                    </div>


                    <div class="dropdown nxl-h-item">
                        <a href="javascript:void(0);" data-bs-toggle="dropdown" role="button"
                            data-bs-auto-close="outside">
                            <img src="{{ asset('images/avatar/1.png') }}" alt="user-image"
                                class="img-fluid user-avtar me-0" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                            <div class="dropdown-header">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/avatar/1.png') }}" alt="user-image"
                                        class="img-fluid user-avtar" />
                                    <div>
                                        <h6 class="text-dark mb-0">{{ Auth::user()->name }} <span
                                                class="badge bg-soft-success text-success ms-1">User</span></h6>
                                        <span class="fs-12 fw-medium text-muted">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </div>




                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i class="feather-user"></i>
                                <span>Editar Perfil</span>
                            </a>




                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="feather-log-out"></i>
                                    <span>Salir</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--! [End] Header Right !-->
        </div>
    </header>
