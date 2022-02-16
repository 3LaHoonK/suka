@extends('layouts.adminStatic')
@section('title')
    {{__('admin/vendor.editTitle') . $data->slug}}
@endsection
@section('editCat')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/vendor.edit-vendor') . $data ->firstName . ' ' . $data ->lastName}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/vendor.home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.vendors')}}">{{__('admin/vendor.vendor')}}</a></li>
                            <li class="breadcrumb-item active">{{__('admin/vendor.edit')}}</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <form method="POST"  action="{{route('admin.updateVendors' , $data->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="container-fluid">
                    <!-- edit vendor -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">{{__('admin/vendor.addTap')}}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-12 text-center">
                                            {{__("admin/vendor.category")}}</label>
                                        <div class="form-group">
                                            <select name="category_id" class="form-control select2bs4" style="width: 100%;">
                                                @foreach($select_data as $dataArray)
                                                    <option {{$data->category_id = $dataArray -> id ? 'selected' : ''}} value="{{$dataArray ->id }}" >{{$dataArray -> name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error ("category_id")
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-12 text-center">{{__("admin/vendor.slug")}}</label>
                                        <input  name="slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('admin/vendor.slug_Ph')}}" value="{{$data->slug}}">
                                        <input hidden  name="admin_create" value="{{Auth::user()->name}}">
                                        @error ("slug")
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("admin/vendor.firstname")}}</label>
                                        <input  name="firstName" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/vendor.firstname_ph")}}" value="{{$data->firstName}}">
                                        @error('firstName')
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("admin/vendor.lastname")}}</label>
                                        <input  name="lastName" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/vendor.lastname_ph")}}" value="{{$data->lastName}}">
                                        @error('lastName')
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("admin/vendor.store-name")}}</label>
                                        <input  name="store_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/vendor.store-name_ph")}}" value="{{$data->store_name}}">
                                        @error('store_name')
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("admin/vendor.email")}}</label>
                                        <input  name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/vendor.email_ph")}}" value="{{$data->email}}">
                                        @error('email')
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("admin/vendor.address")}}</label>
                                        <input  name="address" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/vendor.address_ph")}}" value="{{$data->address}}">
                                        @error('address')
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("admin/vendor.work-phone")}}</label>
                                        <input  name="work_phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/vendor.work-phone_ph")}}" value="{{$data->work_phone}}">
                                        @error('work_phone')
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("admin/vendor.personal-phone")}}</label>
                                        <input  name="personal_phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/vendor.personal-phone_ph")}}" value="{{$data->personal_phone}}">
                                        @error('personal_phone')
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("admin/vendor.home-phone")}}</label>
                                        <input  name="home_phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/vendor.home-phone_ph")}}" value="{{$data->home_phone}}">
                                        @error('home_phone')
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="{{__("admin/category.add")}}">
                            <button  class="btn btn-danger float-right"><a href="{{redirect()->back()}}"></a>{{__("admin/category.Cancel")}}</button>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </form>
        </section>


    </div>
@endsection
