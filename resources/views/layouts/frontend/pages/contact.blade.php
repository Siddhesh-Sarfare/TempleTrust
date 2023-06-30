@extends('layouts.frontend.master')

@section('title')
Contact
@endsection
@section('keywords', 'पालघर, संपर्क, नकाशा, जिल्हा परीषद कार्यालय, जिल्हा परीषद कार्यालय पालघर, मुख्य प्रशासकीय इमारत, नवली, महाराष्ट्र, दूरध्वनी क्रमांक, contact us, map, contact number, maharashtra, navali, office, district, palghar zilla parishad, zilla parishad, palghar')
@section('description')
@foreach ($contact as $item)
{{ $item->name }} -> {{ $item->mobile }} -> {{ $item->email }}
@endforeach
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/contact.css') }}">
<style>
    .header_bottom_right {
    float: right;
    display: inline;
    width: 50%;
    text-align: right;
    padding-right: 6%;
    margin-right: 62%;
    }
    .header_bottom_right li a {
    display: inline-block;
    margin-bottom: 8px;
    opacity: 0.7;
    padding: 3px 7px;
    }
    .header_bottom_right ul {
    padding: 0;
    margin: 0;
    list-style: none;
    }
    .header_bottom_right li {
    display: inline-block;
    }
</style>

@endpush

@push('scripts')
<script>
    $(document).ready(function(){
            $("#mobile").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        })
</script>
@endpush

@section('page-content')
<div class="parallax-image-container">
            <div class="parallax-image" style="background-image: url('{{ asset('assets/frontend/images/parallax/background.jpeg') }}')"></div>
            <div class="container text-content py-5">
                <h1 class="mdc-text-cyan-400" style="text-shadow: 2px 2px #000000;">संपर्क</h1>
                <div class="mt-3 links mdc-text-cyan-400" style="text-shadow: 1px 1px #000000;">
                    <a href="{{ route('home') }}" aria-label="home page">मुख्य पान </a>
                    <a href="#">संपर्क</a>
                </div>
            </div>
        </div>
        @include('layouts.backend.messages')
        <div style="font-weight: bold; font-size:18px; text-align:center;">Locate Us</div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3774.087892706549!2d72.82474201538297!3d18.927503361540857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d1398ced36ff%3A0x437b60e514aeeb50!2sMumbai%20Mantralaya!5e0!3m2!1sen!2sin!4v1656404426021!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <section class="lss-overlay s-map-light s-py-50 c-gutter-60 container-px-30">
            <div class="container ">
                <div class="row" style="background-color: #eee">
                    <div class="col-sm-6" id="page" style="margin-top:3%">
                        <div>
                            <p> </p>
                            <address> <b>मंत्रालय, मादाम कामा रोड,</b><br>
                                हूतात्मा राजगुरु चौक,<br>
                                नरीमन पॉईंट, मुंबई, भारत - ४०००३२.</address>
                            <p></p>
                        </div>
                    
                        <div class="header_bottom_right">
                            <ul>
                                <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="" href="https://twitter.com/maharevenue?lang=en" data-original-title="Twitter" aria-label="twitter page"><img src="{{ asset('assets/frontend/images/social/tweeter.png') }}" height="35" width="35"></a></li>
                                <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="" href="https://www.facebook.com/maharevenue" data-original-title="Facebook" aria-label="facebook page"><img src="{{ asset('assets/frontend/images/social/facebook.png') }}" height="35" width="35"></a></li>
                                {{-- <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="" href="https://www.youtube.com/channel/UCSuyfX-j0Vh_bCUdifKvI4g" data-original-title="Youtube" aria-label="youtube channel"><img src="{{ asset('assets/frontend/images/social/youtube.png') }}" height="35" width="35"></a></li> --}}
                    
                            </ul>
                        </div>
                    
                    
                    </div>
                    <div class="col-lg-6  animate" data-animation="slideDown" style="margin-top:3%; background: gray; border-radius: 1%;">
        
                        <form class="black-bg contact-form c-mb-20 c-gutter-20" method="POST" enctype="multipart/form-data" action="{{ route('contactStore') }}">
                            {{ csrf_field() }}
        
                            <div class="row">
        
                                <div class="col-sm-6">
                                    <div class="ds form-group has-placeholder">
                                        <label for="name">Full Name
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" aria-required="true" size="30" name="name" id="name"
                                            value="{{ old('name') }}" class="form-control" placeholder="Name" required autocomplete="off">
                                            <div class="row d-flex flex-column align-items-center">
                                            <div class="color-main" style="color: #f00;">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-sm-6">
                                    <div class="ds form-group has-placeholder">
                                        <label for="email">Email address
                                            <span class="required">*</span>
                                        </label>
                                        <input type="email" aria-required="true" size="30" name="email" id="email"
                                            value="{{ old('email') }}" class="form-control" placeholder="Email"
                                            required autocomplete="off">
                                            <div class="row d-flex flex-column align-items-center">
                                            <div class="color-main" style="color: #f00;">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
        
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="ds form-group has-placeholder">
                                        <label for="mobile">Mobile
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" aria-required="true" size="30" name="mobile" id="mobile" minlength="10" maxlength="13"
                                            value="{{ old('mobile') }}" class="form-control" placeholder="Mobile"
                                            required autocomplete="off">
                                            <div class="row d-flex flex-column align-items-center">
                                            <div class="color-main" style="color: #f00;">
                                                @error('mobile')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="ds form-group has-placeholder">
                                        <label for="comment">Comment
                                            <span class="required">*</span>
                                        </label>
                                        <textarea aria-required="true" rows="6" cols="4" name="comment" id="comment"
                                            class="form-control" placeholder="Comment" required autocomplete="off">{{ old('comment') }}
                                        </textarea>
                                        <div class="row d-flex flex-column align-items-center">
                                            <div class="color-main" style="color: #f00;">
                                                @error('comment')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="row">
        
                        <div class="col-sm-12 text-center mt-10">
        
                            <div class="form-group">
                                <button type="submit" id="contact_form_submit" name="contact_submit"
                                    class="btn-color" aria-label="Submit feedback form">
                                    Send Now
                                </button>
                            </div>
                        </div>
        
                    </div>
        
                    </form>
                </div>
        
                
                <!--.col-* -->
        
        
            </div>
            </div>
        </section>
        <div class="container pb-4 contact-information">
            <div class="row">
                @php
                $chunk = $contact->chunk(ceil($contact->count()/2));    
                @endphp
                @foreach ($chunk as $item)
                    <div class="col-12 col-md-6">
                        @foreach ( $item as $chunkitem)
                            <div class="contact-card mt-4">
                                <div class="contact-icon">
                                    <div class="icon"><i class="lar la-user"></i></div>
                                </div>
                                <div class="contact-text">
                                    <div class="name"><span>नाव: </span>{{ $chunkitem->name }}</div>
                                    {{-- <div class="email"><i class="lar la-envelope"></i> {{ $chunkitem->email }}</div> --}}
                                    <div class="email"><i class="lar la-envelope"></i> 
                                        @php
                                            $re = '/(\w+)(\@)(\w+)(\.)(\w+)/';
                                            $subst = '$1[at]$3[dot]$5';
                                            @endphp
                                        {{ preg_replace($re, $subst, $chunkitem->email)}}
                                    </div>
                                    <div class="mobile"><i class="las la-phone"></i> {{ $chunkitem->mobile }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
@endsection