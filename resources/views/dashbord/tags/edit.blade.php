@extends('layouts.adminStatic')
@section('title')
    {{__('admin/tag.editTitle') . $data->slug}}
@endsection
@section('editCat')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/tag.edit-tag') . $data ->slug}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/tag.home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.tags')}}">{{__('admin/tag.tag')}}</a></li>
                            <li class="breadcrumb-item active">{{__('admin/tag.edit')}}</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <form method="POST"  action="{{route('admin.updateTags' , $data->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="container-fluid">
                    <!-- edit tag -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">{{__('admin/tag.editTap')}}</h3>
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
                                                {{__("admin/tag." . $selectName)}}
                                            </label>
                                            <div class="form-group">
                                                <select name="{{$selectId}}" class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">{{__('admin/tag.brandPh')}}</option>
                                                    @foreach($selectData as $dataSelect)
                                                        <option {{$data->$selectId == $dataSelect->id ? 'selected' : ''}} value="{{$dataSelect ->id}}" >{{$dataSelect -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error ("{{$selectName}}[parent_id]")
                                            <blockquote class="quote-danger">
                                                <p style="color: #dc3545"> {{$message}}</p>
                                            </blockquote>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("admin/tag.slug")}}</label>
                                        <input  name="slug" type="text" class="form-control" id="exampleInputEmail1" value="{{$data->slug}}">
                                        @error("{{$selectName}}[slug]")
                                        <blockquote class="quote-danger">
                                            <p style="color: #dc3545"> {{$message}}</p>
                                        </blockquote>
                                        @enderror
                                    </div>
                                </div>
                                @foreach($dataTranslation as $key => $dataArray)
                                <section class="content col-12">
                                            <div class="container-fluid">
                                                <!-- add cat -->
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            {{__('admin/tag.edit_' . $dataArray->locale . '_tag_' .$selectName)}}</h3>

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
                                                                    <label>{{__("admin/tag.name_".$selectName)}}</label>
                                                                    <input  name="lang[{{$key}}][name]" type="text" class="form-control" id="exampleInputEmail1" value="{{$dataArray->name}}">
                                                                    <input hidden name="lang[{{$key}}][locale]"  value="{{$dataArray->locale}}">
                                                                    @error("{{$selectName}}lang[{{$key}}][name]")
                                                                    <blockquote class="quote-danger">
                                                                        <p style="color: #dc3545"> {{$message}}</p>
                                                                    </blockquote>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>{{__("admin/tag.description_".$selectName)}}</label>
                                                                    <input  name="lang[{{$key}}][description]" type="text" class="form-control" id="exampleInputEmail1" value="{{$dataArray->description}}">
                                                                    @error("{{$selectName}}lang[{{$key}}][description]")
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
                                                        <span>{{__("admin/tag.notice-content") . __('admin/tag.'.$selectName)}}</span>

                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                                <!--check what's this -->
                                            </div><!-- /.container-fluid -->
                                        </section>
                                @endforeach
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="{{__("admin/category.edit")}}">
                            <button  class="btn btn-danger float-right"><a href="{{redirect()->back()}}"></a>{{__("admin/category.Cancel")}}</button>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </form>
        </section>


</div>
@endsection
