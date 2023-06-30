@extends('layouts.backend.pages.admin.injector.admin-attribute-injection')
@section('sub-title')
    Contact - Edit
@endsection

@section('sub-custom-styles')
@endsection

@section('sub-custom-scripts')
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
@endsection

@section('page-content')
    <div class="main-container container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                @include('layouts.backend.messages')
                <form class="form-horizontal" method="POST" action="{{ route('admin.contact.update',$contact->id) }}">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">
                            <h2 class="m-0">Edit Contact</h2>
                        </div>
                        <div class="card-body">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <!-- name -->
                            <div class="form-group">
                                <label class="col-form-label" for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name',$contact->name) }}" required autofocus>
                            </div>
                            <!-- /name -->
                            <!-- email -->
                            <div class="form-group">
                                <label class="col-form-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email',$contact->email) }}" required>
                            </div>
                            <!-- /email -->
                            <!-- mobile -->
                            <div class="form-group">
                                <label class="col-form-label" for="mobile">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" id="mobile" minlength="10" maxlength="13" value="{{ old('mobile',$contact->mobile) }}" required>
                            </div>
                            <!-- /mobile -->
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <!-- submit -->
                                    <button type="submit" class="btn btn-block btn-success">Update</button>
                                    <!-- /submit -->
                                </div>
                                <div class="col">
                                    <!-- submit -->
                                    <a href="{{ route('admin.contact.index') }}" class="btn btn-block btn-danger">Cancel</a>
                                    <!-- /submit -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
