@extends('layouts.frontend.master')

@section('title')
Prashasan
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/district-info.css') }}">
<style>
    .prashasan-wrapper{
        text-align: center;
        margin-top: 10px;
    }
    .widget-1{
        background: #42a5f5;
        max-width: 300px;
        padding: 20px;
        border-radius: 5px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        margin-bottom: 10px;
        color: #fff;
    }
</style>
@endpush

@push('scripts')

@endpush

@section('page-content')
<div class="parallax-image-container">
    <div class="parallax-image" style="background-image: url('{{ asset('assets/frontend/images/parallax/background.jpeg') }}')"></div>
    <div class="container text-content py-5">
        <h1 class="mdc-text-cyan-400" style="text-shadow: 2px 2px #000000;">प्रशासन</h1>
        <div class="mt-3 links mdc-text-cyan-400" style="text-shadow: 1px 1px #000000;">
            <a href="{{ route('home') }}">मुख्य पान </a>
            <a href="#">प्रशासन</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- <div class="well">value = </div> -->
        <div id="main-content" class="col-md-12">
            <div class="prashasan-wrapper">
                <h3 class="title">जिल्हा स्तर - अधिकारी</h3>
                <div class="widget-1">
                    मुख्य कार्यकारी अधिकारी
                </div>
                <div class="row">
                    <div class="col-lg-3 offset-lg-3">
                        <div class="widget-1">
                            अति. मुख्य कार्यकारी
                            अधिकारी
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            प्रकल्प संचालक - जिल्हा ग्रामीण विकास यंत्रणा
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3">
                        <div class="widget-1">
                            उप मुख्य कार्यकारी अधिकारी (सा.प्र)
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            उप मुख्य कार्यकारी अधिकारी (ग्रा.प)
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            महिला व बाल विकास अधिकारी
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            मुख्य लेखा व वित्त अधिकारी
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-1">
                            खाते प्रमुख
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="widget-1">
                            समाज कल्याण अधिकारी
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            कॄषी विकास अधिकारी
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            जिल्हा पशु संवर्धन अधिकारी
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            जिल्हा आरोग्य अधिकारी
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="widget-1">
                            शिक्षणाधिकारी (प्राथमिक)
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            शिक्षणाधिकारी (माध्यमिक)
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            शिक्षणाधिकारी (निरंतर)
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            कार्यकारी अभियंता बांधकाम
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 offset-lg-3">
                        <div class="widget-1">
                            कार्यकारी अभियंता ग्रामीण पाणी पुरवठा
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget-1">
                            कार्यकारी अभियंता लघुसिंचन
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-1">
                            सहाय्यक अधिकारी
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-1">
                            प्रशासकीय अधिकारी
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection