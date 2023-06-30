@extends('layouts.frontend.master')

@section('title')
Home
@endsection
@section('keywords', 'मुख्य पान, उपक्रम, कार्यक्रम, सूचना फलक, मान्यवर, फेसबुक, ट्विटर, home, upkram, information, department, facebook, twitter, zilla parishad')
@section('description')
@foreach ($upkramList as $item)
{{ $item->title }}
@endforeach
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    <style>
        .mahaMap path{
            stroke: #180054;
            stroke-width: 1;
            fill: transparent;
            -webkit-transition: all .5s;
        }
        .mahaMap path:hover{
            fill:#180054;
        }
        
        svg #Plan_x0020_1:hover text {
        fill: #fff;
        }
       
    </style>

@endpush

@push('scripts')
<!-- scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.8.3/js/lightgallery-all.min.js"></script>
<script src="{{ asset('assets/frontend/js/jquery.marquee.min.js') }}"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="Gie8VPbF"></script>
<script>
    $(document).ready(function (e) {
        $(".media-gallery").lightGallery();

        $(".marquee-item-container").marquee({
            duration: 30000,
            pauseOnHover: true,
            delayBeforeStart: 0,
            direction: "left",
            duplicated: true,
            gap: 0,
        });

        $(".other-news-marquee-container").marquee({
            duration: 30000,
            pauseOnHover: true,
            delayBeforeStart: 0,
            direction: "up",
            duplicated: true,
            gap: 0,
        });

    });
</script>
<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
@endpush

@section('page-content')

        <div id="image-carousel" class="carousel image-carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slider as $item)
                <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
                    <img src="{{ asset("assets/backend/images/slider_images/".$item->image_path) }}" class="slider-image d-block w-100" alt="image-2" />
                </div>
                @endforeach
            </div>
             <a class="carousel-control-prev" href="#image-carousel" role="button" data-slide="prev" aria-label="Previous Slider">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#image-carousel" role="button" data-slide="next" aria-label="Next Slider">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> 
        </div>

        <div class="mdc-bg-grey-100 pt-5 pb-5">
            <div class="container special-survey-other-news">
                <div class="row">
                    <div class="col-12 col-sm-8 special-survey">
                        <div class="row">
                            <div class="col d-flex flex-column align-items-center">
                                <h1>उपक्रम</h1>
                                <div class="bottom-bar mt-4"></div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($upkramList as $item)
                            <div class="col-12 col-sm-6 col-md-4 mt-5">
                                <a href={{ route('upkram-detail', $item->id) }} class="survey-link-card-link" aria-label="{{ $item->title }}">
                                    <div class="survey-link-card mdc-text-white-darker mdc-bg-{{ $item->bg_color }} p-4">
                                        <div class="icon text-center">
                                            <i class="las la-{{ $item->icon }}"></i>
                                        </div>
                                        <div class="text text-center">{{ $item->title }}</div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mdc-bg-grey-100 pt-3 pb-3">
            <div class="container py-5 department-information">
            <div class="row">
                <div class="col d-flex flex-column align-items-center">
                    <h1>विभाग</h1>
                    <div class="bottom-bar mt-4"></div>
                </div>
            </div>
            </div>
        </div>
        <div class="container py-5 media-information">
                <div class="row">
                    <div class="col-12 col-sm-4 mt-3">
                        <div class="header col d-flex flex-column align-items-center">
                            <h1 class="text-center"><img src="{{ asset('assets/frontend/images/social/facebook.png') }}" height="35" width="35">  फेसबुक</h1>
                            <div class="bottom-bar mt-3"></div>
                        </div>
                        <div class="facebook-content mt-5">
                            <div
                                class="fb-page"
                                data-href="https://www.facebook.com/maharevenue"
                                data-tabs="timeline"
                                data-width=""
                                data-height=""
                                data-small-header="false"
                                data-adapt-container-width="true"
                                data-hide-cover="false"
                                data-show-facepile="true"
                            >
                                <blockquote cite="https://www.facebook.com/maharevenue" class="fb-xfbml-parse-ignore">
                                    <a href="https://www.facebook.com/maharevenue" aria-label="Facebook Page">Zilla Parishad Palghar</a>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 mt-3">
                        
                    </div>
                    <div class="col-12 col-sm-4 mt-3">
                        <div class="header col d-flex flex-column align-items-center">
                            <h1 class="text-center"><img src="{{ asset('assets/frontend/images/social/tweeter.png') }}" height="35" width="35">  ट्विटर</h1>
                            <div class="bottom-bar mt-3"></div>
                        </div>
                        <div class="twitter-content mt-5">
                            <a class="twitter-timeline" href="https://twitter.com/maharevenue?lang=en" aria-label="Tweeter Page">Tweets by DGPMaharashtra</a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                </div>
        </div>
        <div style="display: none">
        </div>
 @endsection
