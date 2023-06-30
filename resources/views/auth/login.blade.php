@extends('layouts.backend.master')

@section('title')
    Temple Trust - Login
@endsection

@push('styles')
    <style type="text/css">
        .main-container{
            padding: 100px 0;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/crypto-js@4.1.1/crypto-js.min.js"></script>
<script>
    $( document ).ready(function() {
        let encKey = '{{ $base64Key }}';

        function encrypt(encryptionKey, data){
            let iv = CryptoJS.lib.WordArray.random(16);
            let key = CryptoJS.enc.Base64.parse(encryptionKey);
            let options = {
                iv: iv,
                mode: CryptoJS.mode.CBC,
                padding: CryptoJS.pad.Pkcs7,
            };

            let encrypted = CryptoJS.AES.encrypt(data, key, options);
            encrypted = encrypted.toString();
            iv = CryptoJS.enc.Base64.stringify(iv);
            
            let result = {
                iv: iv,
                value: encrypted,
                mac: CryptoJS.HmacSHA256(iv + encrypted, key).toString(),
            };

            result = JSON.stringify(result);
            result = CryptoJS.enc.Utf8.parse(result);
            return CryptoJS.enc.Base64.stringify(result);
        }


        $("#login-button").click(async function(){
            let toEncrypt = {
                'email' : $("#email").val(),
                'password' : $("#password").val(),
                'g-recaptcha-response' : $("#g-recaptcha-response").val()
            };
            let encryptedData = encrypt(encKey, JSON.stringify(toEncrypt))

            var el = `<form method="POST" action="{{ route('login') }}" style="display: none;" hidden>
            @csrf
            <input name="encryptedData" value="${encryptedData}" hidden>
            <button type="submit" id="encrypted-submit">Login</button>
            </form>`

            $('body').append(el);
            setTimeout(() => {
                $("#encrypted-submit").click()
                $("#email").val("")
                $("#password").val("")
                $(this).attr('disabled',true)
            }, 500);

        });
    });
</script>
@endpush

@section('page-content')
<div class="main-container container h-100 d-flex align-items-center">
    <div class="row justify-content-center d-flex flex-fill no-gutters">
        <div class="col-10 col-sm-10 col-md-6">
            <form class="form-horizontal" id="login-form"   >
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header text-center">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        @csrf
                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <!-- /name -->
                        <!-- password -->
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <!-- /password -->
                        <!-- captcha -->
                        <div class="form-group mt-4">
                            {!! NoCaptcha::renderJs('en', false, 'onloadCallback') !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                        <!-- /captcha -->

                        <!-- submit -->
                        <button type="button" class="btn btn-block btn-primary login-button" id="login-button">Login</button>
                        <!-- /submit -->
                        <!-- error message -->
                        @if ($errors->has('email') || $errors->has('password') || $errors->has('password'))
                            <div class="p-1 mt-3 bg-danger text-white text-center rounded">The provided credentials don't match any of our records.</div>
                        @endif
                        <!-- /error message -->
                        @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <div class="p-1 mt-3 bg-danger text-white text-center rounded">The captcha field is required.</div>
                        </span>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
@endsection
<script type="text/javascript">
    var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
</script>
