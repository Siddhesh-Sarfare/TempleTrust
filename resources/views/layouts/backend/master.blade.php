<!DOCTYPE html>
<html>
    <head>
        @include('layouts.backend.head')
    </head>
    <body class="mdc-bg-grey-200">
        @if(Auth::check())
            @if (Auth::user()->role == 'admin')
            @include('layouts.backend.navigation.admin-navigation')
            @else 
                @include('layouts.backend.navigation.vibhag-navigation')
            @endif
        @else
            @include('layouts.backend.navigation.login-navigation')
        @endif

        @yield('page-content')

        @include('layouts.backend.footer')

        @include('layouts.backend.scripts')
    </body>
</html>