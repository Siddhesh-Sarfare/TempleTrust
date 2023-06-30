@extends('layouts.backend.pages.admin.injector.admin-attribute-injection')

@section('sub-title')
    Vibhag & Yojana - Create
@endsection

@section('sub-custom-styles')
@endsection

@section('sub-custom-scripts')
<script type="text/javascript" src="{{ asset('assets/backend/CKEditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/CKEditor/adapters/jquery.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
            for (const key in CKEDITOR.instances) {
            if (Object.hasOwnProperty.call(CKEDITOR.instances, key)) {
                    const element = CKEDITOR.instances[key];
                    console.log(element);
                    element.destroy();
                }
            }
            var container = $(".ckContainer");
            var existingContent = container.find(".contentDescription");
            console.log(existingContent);
            existingContent.each(function( index ) {
            console.log( index );
            $(this).ckeditor();
            });
        })
</script>

<script>
    $(".add_content").on('click', function () {
        for (const key in CKEDITOR.instances) {
            if (Object.hasOwnProperty.call(CKEDITOR.instances, key)) {
                const element = CKEDITOR.instances[key];
                console.log(element);
                element.destroy();
            }
        }
            var structure = $(".content_structure").html();
            var container = $(".content_holder");
            var contentPdf = container.find(".contentFile").length
            container.append(structure);
            container.find(".contentFile").last().attr('name',`contentFile[${contentPdf}][]`)
            var mainContainer = $(".ckContainer");
            var existingContent = mainContainer.find(".contentDescription");
            console.log(existingContent);
            
            existingContent.each(function( index ) {
                console.log( index );
                $(this).ckeditor();
            });
       
        })
</script>
<script>
        $(document).on('click',".remove-clone",function(){
            $(this).closest('.content-forms').remove()
            })
</script>
@endsection

@section('page-content')
    <div class="main-container container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                @include('layouts.backend.messages')
                <form class="form-horizontal" method="POST" action="{{ route('vibhag.vibhag-yojana.store') }}" enctype="multipart/form-data">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">
                            <h2 class="m-0">Create New Vibhag & Yojana</h2>
                        </div>
                        <div class="card-body">
                            {{ csrf_field() }}
                            <!--category-->
                            <div class="form-group mb-0">
                                <label class="col-form-label" for="category">Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="category" id="category" required="required">
                                        <option value="">Select Category</option>
                                        @foreach ($categoryList as $category)
                                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--/category-->
                            <!-- name -->
                            <div class="form-group">
                                <label class="col-form-label" for="name">Vibhag & Yojana Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            <!-- /name -->
                            <!-- discription -->
                            <div class="ckContainer">
                                <div class="form-group">
                                    <label class="col-form-label" for="discription">Vibhag & Yojana Description (optional)</label>
                                    <textarea name="discription" class="contentDescription" id="discription">{{ old('discription') }} </textarea>
                                </div>
                                <!-- /discription -->

                                <!--Content-->
                                <div class="card-header">
                                    <h2 class="m-0">Content</h2>
                                </div>
                                <!-- for old value input -->
                                <div class="content_holder">
                                    @if(old('contentTitle'))
                                        @foreach(old('contentTitle') as $key=>$index)
                                            <div class="content-forms">
                                                <div class="form-group">
                                                    <input type="text" name="contentTitle[]" class="form-control"
                                                        id="contentTitle"
                                                        placeholder="Add Title (optional)"
                                                        value="{{ old('contentTitle.'.$key) }}" />
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="contentDescription[]" class="contentDescription" id="contentDescription">{{ old('contentDescription.'.$key) }}</textarea>
                                                </div>
                                                <!-- pdf -->
                                                <div class="form-group">
                                                    <label class="col-form-label" for="contentFile">PDF Files (optional)</label>
                                                    <input type="file" name="contentFile[{{ $key }}][]" class="form-control contentFile" id="contentFile" value="{{ old('contentFile.'.$key) }}" multiple>
                                                </div>
                                                <!-- /pdf -->
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            
                            <button type="button" class="add_content" id="add_content">
                                Add Content
                            </button>
                            <!--Content-->
                            
                            <!-- pdf -->
                            <div class="form-group mb-0">
                                <label class="col-form-label" for="file">PDF Files (optional)</label>
                                <input type="file" name="file" class="form-control" id="file">
                            </div>
                            <!-- /pdf -->
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <!-- submit -->
                                    <button type="submit" class="btn btn-block btn-success">Create</button>
                                    <!-- /submit -->
                                </div>
                                <div class="col">
                                    <!-- submit -->
                                    <a href="{{ route('vibhag.vibhag-yojana.index') }}" class="btn btn-block btn-danger">Cancel</a>
                                    <!-- /submit -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--    for content--}}
    <div style="display:none">
        <div class="content_structure">
            <div class="content-forms">
                <div class="form-group">
                    <button type="button" class="remove-clone">Remove</button>
                    <label class="col-form-label" for="contentTitle">Title</label>
                    <input type="text" name="contentTitle[]" class="form-control" placeholder="Add content title" />
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="contentDescription">Description</label>
                    <textarea name="contentDescription[]" class="contentDescription" id="contentDescription"></textarea>
                </div>
                <!-- pdf -->
                <div class="form-group">
                    <label class="col-form-label" for="contentFile">PDF Files (optional)</label>
                    <input type="file" name="contentFile[0][]" class="form-control contentFile" id="contentFile" multiple>
                </div>
                <!-- /pdf -->
            </div>
        </div>
    </div>
@endsection
