@extends('layouts.adminStatic')
@section('title')
    {{__('admin/brand.index_title_edit') . $brand -> name}}
@endsection
@section('editBrand')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/brand.edit_heading') . $brand -> name}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/brand.home')}}</a></li>
                            <li class="breadcrumb-item">{{__('admin/brand.brand')}}</li>
                            <li class="breadcrumb-item active">{{__('admin/brand.edit')}}</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <div>
            <form method="POST"  action="{{route('admin.updateBrands',$brand->id)}}" enctype="multipart/form-data">
                <hr>
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-12 text-center">{{__("admin/brand.slug")}}</label>
                        <input value="{{$brand->slug}}"  name="slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('admin/brand/add.slug_ph')}}">
                        <input value="{{$brand->admin_create}}" hidden  name="admin_create" value="{{Auth::user()->name}}">
                        @error ("slug")
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group">
                        <label class="col-12 text-center">{{__("admin/brand.image")}}</label>
                        <div class="custom-file">
                            <input value="{{$brand->image}}" name="image"  class="custom-file-input" id="exampleInputFile"  type="file" >
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>
                    @error ("image")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <hr>
                @foreach($brandTrans as $key => $brand)
                    <section class="content">
                        <div class="container-fluid">
                            <!-- add cat -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{__('admin/brand.' . $brand->locale . '_edit')}}</h3>

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
                                                <label>{{__("admin/brand.name")}}</label>
                                                <input value="{{$brand->name}}"  name="brand[{{$key}}][name]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/brand/add.name_ph")}}">
                                                <input hidden value="{{$brand->id}}"  name="brand[{{$key}}][id]" type="text">
                                                {{--                                        @error ("name")--}}
                                                {{--                                        <div class="alert alert-danger">{{$message}}</div>--}}
                                                {{--                                        @enderror--}}
                                            </div>
                                            <div class="form-group">
                                                <label>{{__("admin/brand.description")}}</label>
                                                <input  value="{{$brand->description}}" name="brand[{{$key}}][description]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/brand/add.description_ph")}}">
                                                {{--                                        @error ("name")--}}
                                                {{--                                        <div class="alert alert-danger">{{$message}}</div>--}}
                                                {{--                                        @enderror--}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <span class="font-weight-bold bg-warning"><i class="note-icon-eraser"></i>{{__("admin/brand.notice_locale")}}</span>
                                    <span>{{__("admin/brand.notice_locale_contact_" . $brand->locale )}}</span>

                                </div>
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                @endforeach
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">{{__("admin/brand.edit")}}</button>
                    <button  class="btn btn-danger float-right"><a href="{{redirect()->back()}}"></a>{{__("admin/brand.Cancel")}}</button>
                </div>
            </form>

            <!-- /.content -->
        </div>
@endsection
