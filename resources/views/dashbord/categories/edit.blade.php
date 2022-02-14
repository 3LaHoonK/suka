@extends('layouts.adminStatic')
@section('title')
    {{__('admin/category.editTitle').$category->slug}}
@endsection
@section('editCat')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/category.add-cat_'.$type)}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/category.home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.categories')}}">{{__('admin/category.categories_'.$type)}}</a></li>
                            <li class="breadcrumb-item active">{{__('admin/category.edit')}}</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <div>
            <form method="POST"  action="{{route('admin.updateCategories',[$type,$category->id])}}" enctype="multipart/form-data">
                <hr>
                @csrf
                @if($type == "sub")
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-12 text-center">
                                {{__("admin/category.main_category")}}</label>
                            <div class="form-group">
                                <select name="parent_id" class="form-control select2bs4" style="width: 100%;">
                                    <option selected="selected">{{__('admin/category.mainCategoryPh')}}</option>
                                    @foreach($catSelect as $categories)
                                        <option {{$category->id == $categories->id ? "selected" : ""}} value="{{$categories ->id}}" >{{$categories -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error ("parent_id")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-12 text-center">{{__("admin/category.Slug")}}</label>
                        <input value="{{$category->slug}}"  name="slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('admin/category.slug_ph')}}">
                        <input value="{{$category->admin_create}}" hidden  name="admin_create" value="{{Auth::user()->name}}">
                        @error ("slug")
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group">
                        <label class="col-12 text-center">{{__("admin/category.image-cat")}}</label>
                        <div class="custom-file">
                            <input value="{{$category->image}}" name="image"  class="custom-file-input" id="exampleInputFile"  type="file" >
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
                @foreach($catTrans as $key => $categories)
                    <section class="content">
                        <div class="container-fluid">
                            <!-- add cat -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{__('admin/category.' . $categories->locale . '_' .$type)}}</h3>

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
                                                <label>{{__("admin/category.name")}}</label>
                                                <input value="{{$categories->name}}"  name="category[{{$key}}][name]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/category.name_ph")}}">
                                                <input hidden value="{{$categories->id}}"  name="category[{{$key}}][id]" type="text">
                                                {{--                                        @error ("name")--}}
                                                {{--                                        <div class="alert alert-danger">{{$message}}</div>--}}
                                                {{--                                        @enderror--}}
                                            </div>
                                            <div class="form-group">
                                                <label>{{__("admin/category.description")}}</label>
                                                <input  value="{{$categories->description}}" name="category[{{$key}}][description]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/category.description_ph")}}">
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
                                    <span class="font-weight-bold bg-warning"><i class="note-icon-eraser"></i>{{__("admin/category.notice_locale")}}</span>
                                    <span>{{__("admin/category.notice_locale_contact_" . $categories->locale )}}</span>

                                </div>
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                @endforeach
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">{{__("admin/category.edit")}}</button>
                    <button  class="btn btn-danger float-right"><a href="{{redirect()->back()}}"></a>{{__("admin/category.Cancel")}}</button>
                </div>
                <input hidden name="id" value="{{$category->id}}">
            </form>

            <!-- /.content -->
        </div>
@endsection
