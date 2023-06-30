@extends('layouts.frontend.master')

@section('title')
Home
@endsection
@section('keywords', 'मुख्य पान, उपक्रम, कार्यक्रम, सूचना फलक, मान्यवर, फेसबुक, ट्विटर, home, upkram, information, department, facebook, twitter, zilla parishad')
@section('description')
@foreach ($upkramList as $item)
{{ $item->title }}
@endforeach
@foreach ($vibhag as $item)
{{ $item->name }}
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
            <div class="row">
                <div class="owl-carousel owl-theme mt-5">
                    @foreach ($vibhag as $item)
                    <div class="item">
                        <div class="department-card">
                            {{-- <div class="icon-header mdc-bg-blue mdc-text-white-darker p-5 text-center"> --}}
                                @if($item->id==5)
                                <div class="icon-header mdc-bg-blue-100 mdc-text-white-darker p-5 text-center">
                                <i class="las la-university"></i>
                                @elseif($item->id==6)
                                <div class="icon-header mdc-bg-cyan-400 mdc-text-white-darker p-5 text-center">
                                <i class="las la-money-bill"></i>
                                @elseif($item->id==7)
                                <div class="icon-header mdc-bg-green-300 mdc-text-white-darker p-5 text-center">
                                <i class="las la-building"></i>
                                @elseif($item->id==8)
                                <div class="icon-header mdc-bg-amber-400 mdc-text-white-darker p-5 text-center">
                                <i class="las la-home"></i>
                                @elseif($item->id==9)
                                <div class="icon-header mdc-bg-deep-orange-500 mdc-text-white-darker p-5 text-center">
                                <i class="las la-university"></i>
                                @elseif($item->id==10)
                                <div class="icon-header mdc-bg-blue-100 mdc-text-white-darker p-5 text-center">
                                <i class="las la-clinic-medical"></i>
                                @elseif($item->id==11)
                                <div class="icon-header mdc-bg-cyan-400 mdc-text-white-darker p-5 text-center">
                                <i class="las la-dog"></i>
                                @elseif($item->id==12)
                                <div class="icon-header mdc-bg-green-300 mdc-text-white-darker p-5 text-center">
                                <i class="las la-warehouse"></i>
                                @elseif($item->id==13)
                                <div class="icon-header mdc-bg-amber-400 mdc-text-white-darker p-5 text-center">
                                <i class="las la-book"></i>
                                @elseif($item->id==14)
                                <div class="icon-header mdc-bg-deep-orange-500 mdc-text-white-darker p-5 text-center">
                                <i class="las la-laptop"></i>
                                @elseif($item->id==15)
                                <div class="icon-header mdc-bg-blue-100 mdc-text-white-darker p-5 text-center">
                                <i class="las la-house-damage"></i>
                                @elseif($item->id==16)
                                <div class="icon-header mdc-bg-cyan-400 mdc-text-white-darker p-5 text-center">
                                <i class="las la-globe-americas"></i>
                                @elseif($item->id==17)
                                <div class="icon-header mdc-bg-green-300 mdc-text-white-darker p-5 text-center">
                                <i class="las la-water"></i>
                                @elseif($item->id==18)
                                <div class="icon-header mdc-bg-amber-400 mdc-text-white-darker p-5 text-center">
                                <i class="las la-dog"></i>
                                @elseif($item->id==19)
                                <div class="icon-header mdc-bg-deep-orange-500 mdc-text-white-darker p-5 text-center">
                                <i class="las la-water"></i>
                                @elseif($item->id==20)
                                <div class="icon-header mdc-bg-green-300 mdc-text-white-darker p-5 text-center">
                                <i class="las la-pen"></i>
                                @else
                                <div class="icon-header mdc-bg-cyan-100 mdc-text-white-darker p-5 text-center">
                                <i class="las la-university"></i>
                                @endif
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">{{ $item->name }}</div>
                                {{-- link through Json --}}
                            <a href="{{ route('department-plan') }}?department={{ $item->role }}" class="more-info mt-3" aria-label="More information about {{ $item->name }}">More Info</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
        {{-- <div class="container py-5 department-information">
            <div class="row">
                <div class="col d-flex flex-column align-items-center">
                    <h1>विभाग</h1>
                    <div class="bottom-bar mt-4"></div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel owl-theme mt-5">
                    <div class="item">
                        <div class="department-card">
                            <div class="icon-header mdc-bg-blue mdc-text-white-darker p-5 text-center">
                                <i class="las la-university"></i>
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">सामान्य प्रशासन</div>
                                <a href="#" class="more-info mt-3">More Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="department-card">
                            <div class="icon-header mdc-bg-red mdc-text-white-darker p-5 text-center">
                                <i class="las la-city"></i>
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">वित्त विभाग</div>
                                <a href="#" class="more-info mt-3">More Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="department-card">
                            <div class="icon-header mdc-bg-indigo-900 mdc-text-white-darker p-5 text-center">
                                <i class="las la-campground"></i>
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">ग्रामपंचायत विभाग</div>
                                <a href="#" class="more-info mt-3">More Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="department-card">
                            <div class="icon-header mdc-bg-teal-A700 mdc-text-white-darker p-5 text-center">
                                <i class="las la-city"></i>
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">जिल्हा ग्रामीण विकास</div>
                                <a href="#" class="more-info mt-3">More Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="department-card">
                            <div class="icon-header mdc-bg-deep-purple mdc-text-white-darker p-5 text-center">
                                <i class="las la-heart"></i>
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">समाज कल्याण विभाग</div>
                                <a href="#" class="more-info mt-3">More Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="department-card">
                            <div class="icon-header mdc-bg-pink-300 mdc-text-white-darker p-5 text-center">
                                <i class="las la-hospital-alt"></i>
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">आरोग्य विभाग</div>
                                <a href="#" class="more-info mt-3">More Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="department-card">
                            <div class="icon-header mdc-bg-brown-800 mdc-text-white-darker p-5 text-center">
                                <i class="las la-tractor"></i>
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">कृषी विभाग</div>
                                <a href="#" class="more-info mt-3">More Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="department-card">
                            <div class="icon-header mdc-bg-red-900 mdc-text-white-darker p-5 text-center">
                                <i class="las la-city"></i>
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">महिला व बालकल्याण</div>
                                <a href="#" class="more-info mt-3">More Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="department-card">
                            <div class="icon-header mdc-bg-orange mdc-text-white-darker p-5 text-center">
                                <i class="las la-book-open"></i>
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">शिक्षण (प्राथमिक)</div>
                                <a href="#" class="more-info mt-3">More Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="department-card">
                            <div class="icon-header mdc-bg-cyan-800 mdc-text-white-darker p-5 text-center">
                                <i class="las la-school"></i>
                            </div>
                            <div class="department-text px-3 pt-3 pb-3">
                                <div class="title">शिक्षण (माघ्यमिक)</div>
                                <a href="#" class="more-info mt-3">More Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container py-5 media-information">
                <div class="row">
                    {{-- <div class="col-12 col-sm-4 mt-3">
                        <div class="header col d-flex flex-column align-items-center">
                            <h1 class="text-center">फोटो गॅलरी</h1>
                            <div class="bottom-bar mt-4"></div>
                        </div>
                        <div class="content">
                            <div class="row mt-3 media-gallery">
                                @foreach ($gallery as $item)
                                <a href="{{ asset("assets/backend/images/gallery_images/".$item->image_path) }}" class="col-12 col-sm-6 col-xl-6 mt-5">
                                    <div class="gallery-image-container">
                                        <img src="{{ asset("assets/backend/images/gallery_images/".$item->image_path) }}" class="gallery-image" alt="image" />
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div> --}}
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
