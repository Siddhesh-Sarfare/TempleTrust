@extends('layouts.frontend.master')

@section('title')
Screen Reader
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/contact.css') }}">
@endpush

@push('scripts')
<!-- Go to www.addthis.com/dashboard to customize your tools for share social button -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-603389c0034e29b7"></script>
@endpush

@section('page-content')
<div class="parallax-image-container">
    <div class="parallax-image" style="background-image: url('{{ asset('assets/frontend/images/parallax/background.jpeg') }}')"></div>
    <div class="container text-content py-5">
        <h1 class="mdc-text-cyan-400" style="text-shadow: 2px 2px #000000;">स्क्रीन संकेतस्थळ</h1>
        <div class="mt-3 links mdc-text-cyan-400" style="text-shadow: 1px 1px #000000;">
            <a href="{{ route('home') }}" aria-label="home page">मुख्य पान </a>
            <a href="#">स्क्रीन संकेतस्थळ</a>
        </div>
    </div>
</div>
<div class="container py-2">
    <!-- Go to www.addthis.com/dashboard to customize your tools for share social button -->
    <div class="addthis_inline_share_toolbox" style="display: table; margin: 0 auto; padding:10px;" aria-label="share social button"></div>
    <div class="row">
        <h3>
            SCREEN READER ACCESS
        </h3>
        {{-- <p>
            The Zilha Parishad, Palghar website complies with World Wide Web Consortium (W3C) Web Content Accessibility Guidelines (WCAG) 2.0 level AA. 
            This will enable people with visual impairments access the website using assistive technologies, such as screen readers. 
            The information of the website is accessible with different screen readers, such as JAWS, NVDA, SAFA, Supernova and Window-Eyes.
        </p> --}}
        {{-- <p>
            Following table lists the information about different screen readers:
        </p> --}}
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Non Visual Desktop Access (NVDA)</td>
                    <td><a href="http://www.nvaccess.org/" aria-label="NVDA link">http://www.nvaccess.org/</a></td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td>System Access To Go</td>
                    <td><a href="http://www.satogo.com/en/" aria-label="system access link">http://www.satogo.com/en/</a></td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td>Thunder</td>
                    <td><a href="http://www.georgiephone.com/" aria-label="Thunder link">http://www.georgiephone.com/</a></td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td>WebAnywhere</td>
                    <td><a href="http://webanywhere.cs.washington.edu/wa.php" aria-label="web any where link">http://webanywhere.cs.washington.edu/wa.php</a></td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td>Hal</td>
                    <td><a href="https://yourdolphin.com/product?id=3" aria-label="hal link">https://yourdolphin.com/product?id=3</a></td>
                    <td>Commercial</td>
                </tr>
                <tr>
                    <td>JAWS</td>
                    <td><a href="http://www.freedomscientific.com/Products/Blindness/JAWS" aria-label="JAWS link">http://www.freedomscientific.com/Products/Blindness/JAWS</a></td>
                    <td>Commercial</td>
                </tr>
                <tr>
                    <td>Supernova</td>
                    <td><a href="https://yourdolphin.com/product?id=4" aria-label="super nova">https://yourdolphin.com/product?id=4</a></td>
                    <td>Commercial</td>
                </tr>
                <tr>
                    <td>Window-Eyes</td>
                    <td><a href="http://www.gwmicro.com/Window-Eyes/" aria-label="window eyes link">http://www.gwmicro.com/Window-Eyes/</a></td>
                    <td>Commercial</td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>
@endsection