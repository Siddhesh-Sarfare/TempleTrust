@extends('layouts.frontend.master')

@section('title')
Vibhag & Yojana
@endsection
@section('keywords', 'सामान्य प्रशासन, वित्त विभाग, ग्रामपंचायत विभाग, समाजकल्याण विभाग, जिल्हा ग्राम विकास यंत्रणा विभाग, आरोग्य विभाग, कृषी विभाग, महिला व बालविकास विभाग, शिक्षण विभाग (प्राथमिक), शिक्षण विभाग (माध्यमिक), बांधकाम विभाग, लघुपाट बंधारे विभाग, पाणी पुरवठा विभाग, पशुसंवर्धन विभाग, पाणी पुरवठा व स्वच्छता विभाग, म.गां.रा.रो.ह. योजना विभाग zilla parishad, palghar')
@section('description')
@foreach ($vibhagYojanaSEO as $item)
{{ $item->discription }}
@endforeach
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/department-plan.css') }}">
<style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }
    
    td, th {
    border: 1px solid #000000;
    text-align: left;
    padding: 8px;
    }
    
    tr:nth-child(even) {
    background-color: #dddddd;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/frontend/js/alpine.min.js') }}"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools for share social button -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-603389c0034e29b7"></script>
<script>
    function departmentPlan() {
                return {
                    departments: [], // All department
                    activeDepartmentIndex: 0,
                    activeDepartmentData: null, // Selected department json 

                    yojnaCategory : [], // Populated on basis of selected department
                    activeYojnaCategoryIndex: -1,
                    activeYojnaCategoryData: null,
                    
                    yojna : [], // Populated on basis of selected yojna category
                    activeYojnaIndex: -1,
                    activeYojnaData: null,
                    init() {
                        let incomingJson = @json($vibhagYojana->tojson());
                        this.departments = JSON.parse(incomingJson);

                        let urlParams = new URLSearchParams(window.location.search);
                        let departmentUrl = (urlParams.get("department")!=null)?urlParams.get("department"): this.departments[0].id;

                        this.currentActiveDepartment = departmentUrl != null && departmentUrl != "" && !isNaN(parseInt(departmentUrl)) ? departmentUrl : 0;
                        this.departmentSelection(this.currentActiveDepartment);
                    },
                    departmentSelection(id) {
                        let dep = JSON.parse(JSON.stringify(this.departments));
                        let depLength = dep.length;
                        for (let index = 0; index < depLength; index++) {
                            const element=dep[index];

                            if( element.id==id){
                                this.activeDepartmentData= element;
                                this.activeDepartmentIndex=index;
                            }
                        }

                        let activeDepartmentDataClone = JSON.parse(JSON.stringify(this.activeDepartmentData));
                        this.yojnaCategory = activeDepartmentDataClone.yojna_category
                        this.categorySelection(0);
                    },
                    categorySelection(index) {
                        this.activeYojnaCategoryIndex = index;
                        this.activeYojnaCategoryData = this.yojnaCategory[index].yojna;

                        this.yojna = this.activeYojnaCategoryData.map((el) => {
                            return el.name;
                        });
                        this.subCategorySelection(0);
                    },
                    subCategorySelection(index) {
                        this.activeYojnaIndex = index;
                        this.activeYojnaData = this.activeYojnaCategoryData[index];
                    },
                };
            }
</script>

@endpush

@section('page-content')

{{-- <h1 style="padding: 20px; margin:20px; text-align:center;">No Content</h1> --}}
<div class="parallax-image-container">
    <div class="parallax-image" style="background-image: url('{{ asset('assets/frontend/images/parallax/background.jpeg') }}')"></div>
    <div class="container text-content py-5">
        <h1 class="mdc-text-cyan-400" style="text-shadow: 2px 2px #000000;">विभाग व योजना</h1>
        <div class="mt-3 links mdc-text-cyan-400" style="text-shadow: 1px 1px #000000;">
            <a href="{{ route('home') }}" aria-label="Home Page">मुख्य पान </a>
            <a href="#">विभाग व योजना</a>
        </div>
    </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools for share social button -->
<div class="addthis_inline_share_toolbox" style="display: table; margin: 0 auto; padding:10px;" aria-label="Share Social Media Button"></div>
<div class="container pb-4 department-plan-information" x-data="departmentPlan()" x-init="() => init()">
    <template x-if="departments.length > 0">
        <div class="row">
            <div class="col-12 col-md-3 mt-4">
                <div class="departments-container mdc-bg-teal-50">
                    <template x-for="(department, departmentIndex) in departments">
                        <div class="department-link" x-on:click="departmentSelection(department.id)"
                            x-bind:class="{'active': (activeDepartmentIndex == departmentIndex)}"
                            x-text="department.name" aria-label="Department"></div>
                    </template>
                </div>
            </div>
            <div class="col-12 col-md-9 department-details">
                <template x-if="activeDepartmentData != null">
                    <div>
                        <div class="sub-categories-header pb-2">    
                            <template x-for="(category, index) in yojnaCategory">
                                <button type="button" x-on:click="categorySelection(index)"
                                    x-bind:class="{'active': activeYojnaCategoryIndex == index}"
                                    class="btn sub-category px-4 py-2 mx-2 mt-2" x-text="category.category" aria-label="Title Tab"></button>
                            </template>
                        </div>
                        <div class="sub-categories-header2 pb-2">
                            <template x-for="(yoj, index) in yojna">
                                <button type="button" x-on:click="subCategorySelection(index)" x-bind:class="{'active': activeYojnaIndex == index}" class="btn sub-category px-4 py-2 mx-2 mt-2" x-text="yoj" aria-label="Title Tab"></button>
                            </template>
                        </div>
                        <!-- Description -->
                        <div class="sub-category-content mt-3">
                            <div x-html="activeYojnaData.discription">aa</div>
                            <div class="accordion" id="accordionExample">
                                <template x-if="activeYojnaData.content.length > 0">
                                <div>
                                <template x-for="(content, activeYojnaContentIndex) in activeYojnaData.content">
                                    
                                    <div class="card" style="margin: 5px 0;">
                                        <div class="card-header" id="headingOne" style="background: #80cbc4;">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" x-bind:data-target=`#collapse${activeYojnaContentIndex}` x-text="content.title" style="color:black; text-decoration:none; box-shadow:none;">
                                                </button>
                                            </h2>
                                        </div>
        
                                        <div x-bind:id=`collapse${activeYojnaContentIndex}` class="collapse" data-parent="#accordionExample">
                                            <div class="card-body" x-html="content.description" style="background: #e0f2f1;">
                                            </div>
                                            <!-- Files -->
                                            <template x-if="content.content_file.length > 0">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center">Sr No.</th>
                                                            <th>Name</th>
                                                            <th>PDF File</th>
                                                        </tr>
                                                    </thead>
                                            
                                                    <tbody>
                                                        <template x-for="(contentPdf, activeYojnaContentFileIndex) in content.content_file">
                                                            <tr>
                                                                <td style="text-align: center" x-text="activeYojnaContentFileIndex + 1"></td>
                                                                <td x-text="contentPdf.file_name"></td>
                                                                <td>
                                                                    <a onclick="window.open(this.href,'_blank');return false;" class="btn sub-category px-4 py-2 mx-2" x-bind:href="'{{asset('assets/backend/PDF-files/vibhag-yojana-content/')}}/' + contentPdf.file_path">
                                                                        <i class="las la-file-download download-icon" style="font-size: xx-large; color: #007bff;"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </template>
                                                    </tbody>
                                                                                        
                                                </table>
                                            </template>
                                        </div>
                                       
                                    </div>
                                </template>
                                </div>
                                </template>
                            </div>
                            <!-- Files -->
                            <template x-if="activeYojnaData.file_path != null">
                            <table>
                                <tr>
                                    <th style="text-align: center">Sr No.</th>
                                    <th>Name</th>
                                    <th>PDF File</th>
                                </tr>
                                                        
                                <tr>
                                    <td style="text-align: center">1</td>
                                    <td x-text="activeYojnaData.file_name"></td>
                                    <td>
                                        <a onclick="window.open(this.href,'_blank');return false;" class="btn sub-category px-4 py-2 mx-2" x-bind:href="'{{asset('assets/backend/PDF-files/vibhag-yojana/')}}/' + activeYojnaData.file_path">
                                            <i class="las la-file-download download-icon" style="font-size: xx-large; color: #007bff;"></i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            </template>
                            
                    </div>
                </template>
            </div>
        </div>
    </template>
    <template x-if="departments.length == 0">
        <div>loading</div>
    </template>
</div>
@endsection