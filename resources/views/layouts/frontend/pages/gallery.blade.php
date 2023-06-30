@extends('layouts.frontend.master')

@section('title')
Gallery
@endsection
@section('keywords', 'पालघर, गॅलरी, फोटो, इमेज, image, gallry, photo, district, palghar zilla parishad, zilla parishad, palghar')
@section('description')
@foreach ($category as $item)
{{ $item->category }}
@endforeach
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/district-info.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.8.3/css/lightgallery.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.8.3/css/lg-transitions.min.css" />
<style>
    * {
        box-sizing: border-box;
    }

    /* body {
        background-color: #f1f1f1;
        padding: 30px;
        font-family: Arial;
    } */

    /* Center website */
    .main {
        background-color: #f1f1f1;
        padding: 30px;
        max-width: 1000px;
        margin: auto;
    }

    /* h1 {
        font-size: 50px;
        word-break: break-all;
    } */

    /* .row {
        margin: 10px -16px;
    } */

    /* Add padding BETWEEN each column */
    /* .row,
    .row.column {
        padding: 8px;
    } */

    /* Create three equal columns that floats next to each other */
    .column {
        float: left;
        width: 33.33%;
        display: none;
        /* Hide all elements by default */
    }

    /* Clear floats after rows */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Content */
    .content {
        background-color: white;
        padding: 10px;
    }

    /* The "show" class is added to the filtered elements */
    .show {
        display: block;
    }

    /* Style the buttons */
    .btn {
        border: none;
        outline: none;
        padding: 12px 16px;
        background-color: white;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #ddd;
    }

    .btn.active1 {
        background-color: #666;
        color: white;
    }

    /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
    .column {
    width: 100%;
    }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.8.3/js/lightgallery-all.min.js"></script>
<script>
    $(document).ready(function (e) {
                $('#selector1').lightGallery({
                    selector: '.item'
                });
            });
</script>
<script>
    filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active1");
    current[0].className = current[0].className.replace(" active1", "");
    this.className += " active1";
  });
}
</script>
@endpush

@section('page-content')
<div class="parallax-image-container">
    <div class="parallax-image" style="background-image: url('{{ asset('assets/frontend/images/parallax/background.jpeg') }}')"></div>
    <div class="container text-content py-5">
        <h1 class="mdc-text-cyan-400" style="text-shadow: 2px 2px #000000;">Gallery</h1>
        <div class="mt-3 links mdc-text-cyan-400" style="text-shadow: 1px 1px #000000;">
            <a href="{{ route('home') }}" aria-label="home page">मुख्य पान </a>
            <a href="#">Gallery</a>
        </div>
    </div>
</div>

<!-- MAIN (Center website) -->
<div class="main">

    <div id="myBtnContainer">
        <button class="btn active1" onclick="filterSelection('all')" aria-label="All Photos"> Show all</button>
        @foreach ($category as $item)
        <button class="btn" onclick="filterSelection('{{  $item->id }}')" aria-label="{{  $item->category }} category"> {{  $item->category }}</button>
        @endforeach
    </div>

    <!-- Portfolio Gallery Grid -->
    <div class="row selector1" id="selector1" style="margin: 10px -16px;">
        @if ($gallery->isNotEmpty())
        @foreach ($gallery as $item)
        <div class="column {{ $item->category_id }}">
            <div class="content">
            <div class="item" data-src="{{ $item->file_path }}" aria-label="view full image" data-sub-html="<h1>{{ $item->file_name }}</h1>">
                <img src="{{ $item->file_path }}" alt="" width="100%" height="250" />
             </div>
                {{-- <h4>Mountains</h4>
                <p>Lorem ipsum dolor..</p> --}}
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <!-- END MAIN -->
</div>


@endsection