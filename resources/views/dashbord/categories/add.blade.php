@extends('layouts.adminStatic')
@section('title')
    {{__('admin/category.addTitle-'.$type)}}
@endsection
@section('addCat')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/category.add-'.$type)}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/category.home')}}</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('admin.categories')}}">{{__('admin/category.category-'.$type)}}</a></li>
                            <li class="breadcrumb-item active">{{__('admin/category.add')}}</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <div>
        <form method="POST"  action="{{route('admin.storeCategories',$type)}}" enctype="multipart/form-data">
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
                            @foreach($category as $categories)
                            <option value="{{$categories ->id}}" >{{$categories -> name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error ("parent_id")
                    <blockquote class="quote-danger">
                        <p style="color: #dc3545"> {{$message}}</p>
                    </blockquote>
                    @enderror
                </div>
            </div>
            @endif

            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-12 text-center">{{__("admin/category.Slug")}}</label>
                    <input  name="slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('admin/category.slug_ph')}}">
                    <input hidden  name="admin_create" value="{{Auth::user()->name}}">
                    @error ("slug")
                    <blockquote class="quote-danger">
                        <p style="color: #dc3545"> {{$message}}</p>
                    </blockquote>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group">
                    <label class="col-12 text-center">{{__("admin/category.image-cat")}}</label>
                    <div class="custom-file">
                        <input name="image"  class="custom-file-input" id="exampleInputFile"  type="file" >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
                @error ("image")
                <blockquote class="quote-danger">
                    <p style="color: #dc3545"> {{$message}}</p>
                </blockquote>
                @enderror
            </div>
            <hr>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
{{--                <a class="dropdown-item active" rel="alternate" hreflang="{{ $localeCode }}" href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                    <i class="flag-icon flag-icon-{{ $properties['native'] == 'English' ? 'us' : 'eg'}} "></i>--}}
{{--                    {{ $properties['name']}}--}}
{{--                </a>--}}

            <section class="content">
                <div class="container-fluid">
                    <!-- add cat -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{__('admin/category.' . $localeCode . '_' .$type)}}</h3>

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
                                        <input  name="category[{{$localeCode}}][name]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/category.name-" . $localeCode)}}">
                                        <input hidden name="category[{{$localeCode}}][locale]"  value="{{$localeCode}}">
                                        @error('category[{{$localeCode}}][name]')
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                        <div class="form-group">
                                        <label>{{__("admin/category.description")}}</label>
                                        <input  name="category[{{$localeCode}}][description]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/category.description-" . $localeCode)}}">
                                            @error('category[{{$localeCode}}][description]')
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
                            <span class="font-weight-bold bg-warning"><i class="note-icon-eraser"></i>{{__("admin/category.notice_locale")}}</span>
                            <span>{{__("admin/category.notice_locale_contact_" . $localeCode )}}</span>

                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            @endforeach
            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{__("admin/category.submit")}}</button>
{{--                <button  class="btn btn-danger float-right"><a href="{{redirect()->back()}}"></a>{{__("admin/category.Cancel")}}</button>--}}
            </div>
        </form>

        <!-- /.content -->
    </div>


@endsection
