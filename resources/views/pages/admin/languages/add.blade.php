@extends('layouts.adminStatic')
@section('addlanguages')

<div class="content-body" style="min-height: 876px;">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashbord')}}">{{__('admin.Home')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.languages')}}">{{__('admin.Languages-list')}}</a></li>
                <li class="breadcrumb-item active">{{__('admin.addlanguage')}}</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post" action="{{route('admin.addlanguagescheck')}}" >
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">{{__('admin.Language-Name')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="name" placeholder="name" value="{{old('name')}}">
                                        @error ('name')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">{{__('admin.Language-Abbr')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="abbr" placeholder="abbr" value="{{old('abbr')}}">
                                        @error ('abbr')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">{{__('admin.Language-Locale')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-password" name="locale" placeholder="locale" value="{{old('locale')}}">
                                        @error ('locale')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">{{__('admin.Language-Direction')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="direction">
                                            <option value="">Please select</option>
                                            <option value="rtl">RTL</option>
                                            <option value="ltr">LTR</option>
                                        </select>
                                        @error ('direction')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label"><a href="#">{{__('admin.active')}} &amp; {{__('admin.inactive')}}</a>  <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                            <input type="checkbox" class="css-control-input" id="val-terms" name="active" value="1"> <span class="css-control-indicator"></span>{{__('admin.active?')}}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection
