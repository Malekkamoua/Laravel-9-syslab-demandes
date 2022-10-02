<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a href="{{ route('demandes') }}">
            <img src="https://barounilab.com/wp-content/uploads/2021/11/cropped-logo-BAROUNI.png"
                style="width: 100%; max-width: 100px; position: relative;left: 24%;" />
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Mon activité') }}</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">

                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">

                @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-employees') }}">
                        <i class="ni ni-bullet-list-67 text-default"></i>
                        Liste des correspondants
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-analyses') }}">
                        <i class="ni ni-bullet-list-67 text-default"></i>
                        Liste des analyses
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('demandes') }}">
                        <i class="ni ni-bullet-list-67 text-default"></i>
                        <span class="nav-link-text">Liste des demandes</span>
                    </a>
                </li>

                @if (auth()->user()->role != 'admin')

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('demande-add') }}">
                        <i class="ni ni-bullet-list-67 text-default"></i>
                        Ajouter une demande
                    </a>
                </li>

                @endif

            </ul>
        </div>
    </div>
</nav>