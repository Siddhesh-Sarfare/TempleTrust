<!-- navigation -->
<nav class="shadow-sm navbar fixed-top navbar-expand-xl mdc-bg-grey-100">
    <a href="{{ route('vibhag.YojanaCategory.index') }}" class="navbar-brand">Temple Trust - {{ Auth::user()->name }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- YojanaCategory -->
            <li class="nav-item dropdown {{ request()->is('vibhag/YojanaCategory*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    योजना Category
                </a>
                <div class="dropdown-menu mt-auto" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('vibhag.YojanaCategory.index') }}">Show All</a>
                    <a class="dropdown-item" href="{{ route('vibhag.YojanaCategory.create') }}">Create New</a>
                    <a class="dropdown-item" href="{{ route('vibhag.YojanaCategory.deleted.show') }}">Deleted</a>
                </div>
            </li>
            <!-- /YojanaCategory -->
            <!-- vibhag-yojana -->
            <li class="nav-item dropdown {{ request()->is('vibhag/vibhag-yojana*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    विभाग व योजना
                </a>
                <div class="dropdown-menu mt-auto" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('vibhag.vibhag-yojana.index') }}">Show All</a>
                    <a class="dropdown-item" href="{{ route('vibhag.vibhag-yojana.create') }}">Create New</a>
                    <a class="dropdown-item" href="{{ route('vibhag.vibhag-yojana.deleted.show') }}">Deleted</a>
                </div>
            </li>
            <!-- /vibhag-yojana -->
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-sign-out-alt "></i> Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- /navigation -->