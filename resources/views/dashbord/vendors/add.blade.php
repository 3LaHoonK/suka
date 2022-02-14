@extends('layouts.adminStatic')
@section('addVendors')

<div class="content-body" style="min-height: 876px;">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin.Home')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.vendors')}}">{{__('admin.Vendors-list')}}</a></li>
                <li class="breadcrumb-item active">{{__('admin.addVendor')}}</li>
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
                            <form class="form-valide"  method="post" action="{{route('admin.addvendorscheck')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-Name">{{__('admin.Vendor-Name')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-Name" name="name" placeholder="ex: Abdulrhman-taher"  value="{{old('name')}}">
                                        @error ('name')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email" >{{__('admin.Vendor-Email')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                            <input type="text" class="form-control" name="email" id="val-email" placeholder="email" aria-label="Username"
                                             value="{{old('email')}}" aria-describedby="basic-addon1" placeholder="ex: abdo-taher@example.com">
                                        </div>
                                        @error ('email')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password" >{{__('admin.Vendor-password')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">*</span>
                                            <input type="password" class="form-control" name="password" id="val-email" placeholder="password" aria-label="password"
                                             value="{{old('password')}}" aria-describedby="basic-addon1" placeholder="password">
                                        </div>
                                        @error ('password')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password_confirmation" >{{__('admin.Vendor-password_confirmation')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">*</span>
                                            <input type="password" class="form-control" name="password_confirmation" id="val-email" placeholder="password_confirmation" aria-label="password_confirmation"
                                             value="{{old('password_confirmation')}}" aria-describedby="basic-addon1" placeholder="password_confirmation">
                                        </div>
                                        @error ('password_confirmation')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-Address">{{__('admin.Vendor-Address')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-Address"  name="address" placeholder="ex: egept,mansoura,aga,sanjed " value="{{old('address')}}">
                                        @error ('address')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                        @error ('address')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-Mobile">{{__('admin.Vendor-Mobile')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-Mobile" name="mobile" placeholder="ex: 02010********** "  value="{{old('mobile')}}">
                                        @error ('mobile')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-image">{{__('admin.Vendor-Logo')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" name="logo" class="form-control" id="inputGroupFile02" value="{{old('logo')}}">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                          </div>
                                        {{-- <input type="file" class="form-control" id="val-image" name="logo"  > --}}
                                        @error ('logo')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-category_id">{{__('admin.Vendor-category_id')}}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-category_id" name="category_id">
                                            <option value="">Please select</option>
                                            @isset($category)
                                                @foreach ($category as $cat)
                                                <option {{$cat->id == old('category_id') ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                        @error ('category_id')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label"><a href="#">{{__('admin.active')}} &amp; {{__('admin.inactive')}}</a>  <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <div class="basic-form" >
                                            <div class="form-group" >
                                                <div class="radio mb-2">
                                                    <label class="col-lg-3" style="color:green;"><input  checked  type="radio" name="active" value="1">{{__('admin.active')}}</label>
                                                    <label class="col-lg-3" style="color:red"><input   type="radio" name="active" value="0">{{__('admin.inactive')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12 ml-auto"><br>
                                        <button type="submit" class="btn btn-block btn-primary">{{__('admin.Submit')}}</button>
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



