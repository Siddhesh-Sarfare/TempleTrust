<style>
    .navbar-expand-lg .navbar-nav .nav-link{
        padding-left: 1.2rem;
        padding-right: 1.2rem;
        /* border-right: 1px solid white; */
    }
    .navbar-expand-lg .navbar-nav .nav-link:hover,
    .navbar-expand-lg .navbar-nav .nav-link:focus {
    background-color: #01579B;
    border-radius: 10px;
    }

    .navbar-expand-lg .navbar-nav .nav-item a{
    color: #ffffff !important;
    }

    .navbar-expand-lg .navbar-nav .nav-item.active {
    background-color: #01579B;
    border-radius: 10px;
    }

    .header-top {
    background: #f1f1f1;
    padding: 5px 0;
    }
    .header-top .header-links-right {
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: flex-end;
    }
    .header-top .header-links-right li {
    padding-right: 10px;
    list-style-type: none;
    }

    /* mobile view navigation bar */
    @media only screen and (max-width: 600px) {
    .navbar-expand-lg .navbar-nav .nav-link:hover,
    .navbar-expand-lg .navbar-nav .nav-link:focus {
    background-color: #FBC02D;
    border-radius: 0;
    }
    .navbar-expand-lg .navbar-nav .nav-item {
    /* background-color: #fff176; */
    color: #f1f1f1;
    border: none;
    border-radius: 0px;
    margin: 0 10px;
    }
    .navbar-expand-lg .navbar-nav .nav-item.active {
    background-color: #FBC02D;
    border-radius: 0px;
    }
    }
    
</style>
<script>
    // on scroll fix navbar at top
    document.addEventListener("DOMContentLoaded", function(){
    window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
    document.getElementById('navbar_top').classList.add('fixed-top');
    // add padding top to show content behind navbar
    navbar_height = document.querySelector('.navbar_top').offsetHeight;
    document.body.style.paddingTop = navbar_height + 'px';
    } else {
    document.getElementById('navbar_top').classList.remove('fixed-top');
    // remove padding top from body
    document.body.style.paddingTop = '0';
    }
    });
    });
</script>

{{-- <div class="fixed-top"> --}}
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="header-links-right">
                    <li><a href="{{ route('screen-reader') }}" aria-label="Screen Reader Access"><img src="{{ asset('assets/frontend/images/screen-reader.png') }}" alt="screen_reader"/> Screen Reader Access</a></li>
                    {{-- <li><a href="#googtrans(en)" class="lang-en lang-select" data-lang="en" aria-label="translate English" style="color: black;">English</a></li>
                    <li><a href="#googtrans(mr)" class="lang-es lang-select" data-lang="mr" aria-label="translate Marathi" style="color: black;">मराठी</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="navbar_top" class="navbar_top">
<div class="">
    <div class="justify-content-center">
        <a href="#">
            <img src="{{ asset('assets/frontend/images/Banner.jpg') }}" style="width: 100%; height: 200px;">
        </a>
    </div>
</div>
<div class="navigation mdc-text-white-darker" style="background:#0277BD">
    <div class="container" style="min-width: fit-content;">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="border: 1px solid black;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    </span>
                    <span style="font-weight:bold; color:black;">Menu</span>
            </button>
            {{-- <div class="ct-topbar">
                <div class="container">
                    <ul class="list-unstyled list-inline ct-topbar__list">
                        <li class="ct-language">Language <i class="fa fa-arrow-down"></i>
                            <ul class="list-unstyled ct-language__dropdown">
                                <li><a href="#googtrans(en)" class="lang-en lang-select" data-lang="en">English</a></li>
                                <li><a href="#googtrans(mr)" class="lang-es lang-select" data-lang="mr">मराठी</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div> --}}
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                        {{-- <a class="nav-link" href="{{ route('home') }}" aria-label="Home Page">मुख्य पान</a> --}}
                        <a class="nav-link" href="{{ route('home') }}" aria-label="Home Page">Home</a>
                    </li>
                    {{-- <li class="nav-item dropdown {{ request()->is('/home') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            जिल्हा परिषद
                        </a>
                        <div class="dropdown-menu mt-auto" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('prashasan') }}">प्रशासन</a>
                        </div>
                    </li> --}}
                    {{-- <li class="nav-item {{ request()->is('department-plan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('department-plan') }}" aria-label="Department and Yojana">विभाग</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" onclick="window.open(this.href,'_blank');return false;" href="https://rfd.maharashtra.gov.in/sites/default/files/revised_subject_list.pdf" aria-label="yadi">टेलिफोन डिरेक्टरी</a>
                    </li> --}}
                    <li class="nav-item">
                        {{-- <a class="nav-link" onclick="window.open(this.href,'_blank');return false;" href="https://home.maharashtra.gov.in/Sitemap/home/HomeCitizenCharter-Marathi.htm" aria-label="Nagrikanchi Sanad">नागरिकांची सनद</a> --}}
                        <a class="nav-link" onclick="window.open(this.href,'_blank');return false;" href="https://home.maharashtra.gov.in/Sitemap/home/HomeCitizenCharter-Marathi.htm" aria-label="Nagrikanchi Sanad">Citizen Charter</a>
                    </li>
                    <li class="nav-item {{ request()->is('gallery') ? 'active' : '' }}">
                        <a class="nav-link" href="#" aria-label="Gallery">Schemes</a>
                    </li>
                    <li class="nav-item {{ request()->is('gallery') ? 'active' : '' }}">
                        {{-- <a class="nav-link" href="{{ route('gallery') }}" aria-label="Gallery">फोटो</a> --}}
                        <a class="nav-link" href="{{ route('gallery') }}" aria-label="Gallery">Photo</a>
                    </li>
                    <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                        {{-- <a class="nav-link" href="{{ route('contact') }}" aria-label="Contact us">संपर्क </a> --}}
                        <a class="nav-link" href="{{ route('contact') }}" aria-label="Contact us">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
</div>
{{-- </div> --}}
