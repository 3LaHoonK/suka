@extends('layouts.adminStatic')
@section('title')
    {{__('admin/tag.addTitle')}}
@endsection
@section('addTag')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/tag.add-tag')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/tag.home')}}</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('admin.tags')}}">{{__('admin/tag.tag')}}</a></li>
                            <li class="breadcrumb-item active">{{__('admin/tag.add')}}</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="col-12">
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        @foreach($data as $dataBack)
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-{{$dataBack}}-tab" data-toggle="pill" href="#custom-tabs-three-{{$dataBack}}"
                                   role="tab" aria-controls="custom-tabs-three-{{$dataBack}}" aria-selected="false">{{__('admin/tag.'.$dataBack )}}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="card-body">

                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        @foreach($data as $dataBack)
                        <div class="tab-pane {{$ax == $dataBack ? 'active' : ''}}" id="custom-tabs-three-{{$dataBack}}"
                             role="tabpanel" aria-labelledby="custom-tabs-three-{{$dataBack}}-tab">
                            <form method="POST"  action="{{route('admin.storeTags')}}" enctype="multipart/form-data">
                                <hr>
                                @csrf
                                @if($dataBack == "brand")
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-12 text-center">
                                                {{__("admin/tag.brand")}}
                                            </label>
                                            <div class="form-group">
                                                <select name="brand_id" class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">{{__('admin/tag.brandPh')}}</option>
                                                    @foreach($brand as $brands)
                                                        <option value="{{$brands ->id}}" >{{$brands -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error ("{{$dataBack}}[parent_id]")
                                            <blockquote class="quote-danger">
                                                <p style="color: #dc3545"> {{$message}}</p>
                                            </blockquote>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                                @if($dataBack == "category")
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-12 text-center">
                                                {{__("admin/tag.category")}}</label>
                                            <div class="form-group">
                                                <select name="category_id" class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">{{__('admin/tag.categoryPh')}}</option>
                                                    @foreach($cat as $category)
                                                        <option value="{{$category ->id}}" >{{$category -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error ("{{$dataBack}}[parent_id]")
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
                                        <input  name="slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('admin/tag.slug_ph')}}">
                                        <input hidden  name="admin_create" value="{{Auth::user()->name}}">
                                        @error ("slug")
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <section class="content">
                                        <div class="container-fluid">
                                            <!-- add cat -->
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        {{__('admin/tag.' . $localeCode . '_tag_' .$dataBack)}}</h3>

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
                                                                <label>{{__("admin/tag.name_".$dataBack)}}</label>
                                                                <input  name="lang[{{$localeCode}}][name]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/tag.name_ph_" . $dataBack . '_' . $localeCode)}}">
                                                                <input hidden name="lang[{{$localeCode}}][locale]"  value="{{$localeCode}}">
                                                                @error("{{$dataBack}}lang[{{$localeCode}}][name]")
                                                                <blockquote class="quote-danger">
                                                                    <p style="color: #dc3545"> {{$message}}</p>
                                                                </blockquote>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__("admin/tag.description_".$dataBack)}}</label>
                                                                <input  name="lang[{{$localeCode}}][description]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/tag.description_ph_" . $dataBack  . '_' . $localeCode)}}">
                                                                @error("{{$dataBack}}lang[{{$localeCode}}][description]")
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
                                                    <span class="font-weight-bold bg-warning"><i class="note-icon-eraser"></i>{{__("admin/tag.notice")}}</span>
                                                    <span>{{__("admin/tag.notice-content") . __('admin/tag.'.$dataBack)}}</span>

                                                </div>
                                            </div>
                                            <!-- /.row -->
                                            <!--check what's this -->
                                            <input hidden name="type" value="{{$dataBack}}">
                                        </div><!-- /.container-fluid -->
                                    </section>
                                @endforeach
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">{{__("admin/tag.add")}}</button>
                                    <button  class="btn btn-danger float-right"><a href="{{redirect()->back()}}"></a>{{__("admin/tag.Cancel")}}</button>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>

                </div>

                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
