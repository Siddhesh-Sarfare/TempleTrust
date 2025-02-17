<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<style>
    * {
    padding: 0;
    margin: 0;
    border: 0;
    outline: none;
    }
    
    html,
    body {
    height: 100%;
    }
    
    .splash-image-holder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    
    .splash-image-holder .splash-image {
    height: inherit;
    width: -webkit-fill-available;
    max-width: 100%;
    max-height: 100%;
    display: flex;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Palghar ZP</title>
    <meta name="description" content="">
    <meta name="author" content="Yasin Allana">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/mdc.min.css')}}"> --}}
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="splash-image-holder mdc-bg-light-blue-900">
        <img src="{{asset('assets/frontend/images/CurtainOpening.gif')}}" class="splash-image" />
    </div>
    <script type="text/javascript">
        setTimeout(() => {
            window.location = '{{route('home')}}';
        }, 3000);
    </script>
</body>

</html>