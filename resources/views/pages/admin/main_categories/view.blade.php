@extends('layouts.adminStatic')
@section('viewcat')


<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashbord')}}">{{__('admin.Home')}}</a></li>
                <li class="breadcrumb-item active"><a href="">{{__('admin.main_categories')}}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        @include('includes.admin.allert')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6" >
                                <h2 class="card-title">{{__('admin.Categories-list')}}</h2>
                            </div>
                            <div class="col-6" >
                                <div class="dropdown custom-dropdown float-right">
                                    <div data-toggle="dropdown" aria-expanded="false">
                                        <i class="ti-more-alt"></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(14px, 21px, 0px);">
                                        <a class="dropdown-item" href="{{route('admin.selectcategories',$action = 'all')}}">All</a>
                                        <a class="dropdown-item" href="{{route('admin.selectcategories',$action = 'main')}}">main</a>
                                        <a class="dropdown-item" href="{{route('admin.selectcategories',$action = 'active')}}">active</a>
                                        <a class="dropdown-item" href="{{route('admin.selectcategories',$action = 'inactive')}}">inactive</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            </div>
                                        </th>
                                        <th>{{__('admin.ID')}}</th>
                                        <th>{{__('admin.NAME')}}</th>
                                        <th>{{__('admin.Translation_Lang')}}</th>
                                        <th>{{__('admin.Translation_Of')}}</th>
                                        <th>{{__('admin.Slug')}}</th>
                                        <th>{{__('admin.image')}}</th>
                                        <th>{{__('admin.Status')}}</th>
                                        <th>{{__('admin.Settings')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($categorie)
                                    @foreach ($categorie as $categories)
                                        <tr style="text-align: center">

                                            <td class="text-bold-500">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                            </td>
                                            <td>{{$categories->id}}</td>
                                            <td>{{$categories->name}}</td>
                                            <td>{{$categories->language->name}}</td>
                                            <td>{{$categories->translation_of}}</td>
                                            <td>{{$categories->slug}}</td>
                                            <td><img class="" style="height: 100px ; width:100px" src="{{ asset('assets\images\faces\4.jpg')}}" alt="{{ __('abdo') }}"></td>
                                            <td style="color:{{$categories->active == 1 ? '#0E9A00' : '#8c0615'}}">{{$categories->active == 1 ? 'Active' : 'Inactive'}}</td>
                                            <td>

                                                <a title="{{__('add producte')}}" href="{{route('admin.deletesubcategories', $categories -> id )}}">
                                                    <button type="button" class="btn btn-outline-warning"><i class="fa fa-caret-square-o-up"></i></button>
                                                </a><br>
                                                <a alt="{{__('admin.active')}}" href="{{route('admin.activecategories', $categories -> id )}}">
                                                    <button rel="dlk" type="button" class="btn btn-outline-{{$categories->active == 1 ? 'info' : 'danger'}}"><i class="icon-{{$categories->active == 1 ? 'lock' : 'key'}}"></i></button>
                                                </a><br>
                                                <a alt="{{__('admin.edite')}}" href="{{route('admin.editcategories', $categories -> id )}}">
                                                    <button type="button" class="btn btn-outline-success"><i class="fa fa-edit"></i></button>
                                                </a><br>
                                                <a alt="{{__('admin.delete')}}" href="{{route('admin.deletecategories', $categories -> id )}}">
                                                    <button type="button" class="btn btn-outline-danger"><i class="fa fa-close"></i></button>
                                                </a>


                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            </div>
                                        </th>
                                        <th>{{__('admin.ID')}}</th>
                                        <th>{{__('admin.NAME')}}</th>
                                        <th>{{__('admin.Translation_Lang')}}</th>
                                        <th>{{__('admin.Translation_Of')}}</th>
                                        <th>{{__('admin.Slug')}}</th>
                                        <th>{{__('admin.Image')}}</th>
                                        <th>{{__('admin.Status')}}</th>
                                        <th>{{__('admin.Settings')}}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
