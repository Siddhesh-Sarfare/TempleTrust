<!-- navigation -->
<nav class="shadow-sm navbar fixed-top navbar-expand-xl mdc-bg-grey-100">
    <a href="{{ route('admin.roles.index') }}" class="navbar-brand">Temple Trust - {{ Auth::user()->name }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            
            <!-- Roles  -->
            {{-- <li class="nav-item dropdown {{ request()->is('admin/roles*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Roles
                </a>
                <div class="dropdown-menu mt-auto" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('admin.roles.index') }}">Show All</a>
                    <a class="dropdown-item" href="{{ route('admin.roles.create') }}">Create New</a>
                    <a class="dropdown-item" href="{{ route('admin.roles.deleted.show') }}">Deleted Roles</a>
                </div>
            </li> --}}
            <!-- /Roles -->
            <!-- Category -->
            <li class="nav-item dropdown {{ request()->is('admin/GalleryCategory*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
            
            
                <ul class="dropdown-menu mt-auto" aria-labelledby="navbarDropdown">

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Gallery Category</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.GalleryCategory.index') }}">Show All</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.GalleryCategory.create') }}">Create New</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.GalleryCategory.deleted.show') }}">Deleted </a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>

            </li>
            <!-- /Category -->
            <!-- Account -->
            {{-- <li class="nav-item dropdown {{ request()->is('admin/accounts*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Accounts
                </a>
                <div class="dropdown-menu mt-auto" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('admin.accounts.index') }}">Show All</a>
                    <a class="dropdown-item" href="{{ route('admin.accounts.create') }}">Create New</a>
                    <a class="dropdown-item" href="{{ route('admin.accounts.deleted.show') }}">Deleted Accounts</a>
                </div>
            </li> --}}
            <!-- /Account -->
            <!-- home page -->
            <li class="nav-item dropdown {{ request()->is('admin/slider*') ? 'active' : '' }} {{ request()->is('admin/upkram*') ? 'active' : '' }} {{ request()->is('admin/gallery*') ? 'active' : '' }} ">
                <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    मुख्य पान
                </a>
                
                <ul class="dropdown-menu mt-auto" aria-labelledby="navbarDropdown">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Slider Images</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.slider.index') }}">Show All</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.slider.create') }}">Create New</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.slider.deleted.show') }}">Deleted </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">उपक्रम</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.upkram.index') }}">Show All</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.upkram.create') }}">Create New</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.upkram.deleted.show') }}">Deleted </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">फोटो गॅलरी</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.gallery.index') }}">Show All</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.gallery.create') }}">Create New</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.gallery.deleted.show') }}">Deleted </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- /home page -->
             <!-- trusty -->
            <li class="nav-item dropdown {{ request()->is('admin/trusty*') ? 'active' : '' }} {{ request()->is('admin/manager*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    विश्वस्त
                </a>
                
                <ul class="dropdown-menu mt-auto" aria-labelledby="navbarDropdown">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">विश्वस्त मंडळ</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.trusty.index') }}">Show All</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.trusty.create') }}">Create New</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.trusty.deleted.show') }}">Deleted </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">संयुक्त व्यवस्थापक</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.manager.index') }}">Show All</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.manager.create') }}">Create New</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.manager.deleted.show') }}">Deleted </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- /trusty -->
            <!-- contact -->
            <li class="nav-item dropdown {{ request()->is('admin/contact*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    संपर्क
                </a>
                <div class="dropdown-menu mt-auto" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('admin.contact.index') }}">Show All</a>
                    <a class="dropdown-item" href="{{ route('admin.contact.create') }}">Create New</a>
                    <a class="dropdown-item" href="{{ route('admin.contact.deleted.show') }}">Deleted </a>
                </div>
            </li>
            <!-- /contact -->
        </ul>
        
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-sign-out-alt "></i> Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- /navigation -->
