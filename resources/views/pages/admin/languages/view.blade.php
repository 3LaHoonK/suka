@extends('layouts.adminStatic')
@section('viewlanguages')


<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashbord')}}">{{__('admin.Home')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.languages')}}">{{__('admin.Languages')}}</a></li>
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
                                <h2 class="card-title">{{__('admin.Languages-list')}} / <a href="{{route('admin.addlanguages')}}"><span>add new</span></a></h2>
                            </div>
                            <div class="col-6" >
                                <div class="dropdown custom-dropdown float-right">
                                    <div data-toggle="dropdown" aria-expanded="false">
                                        <i class="ti-more-alt"></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(14px, 21px, 0px);">
                                        <a class="dropdown-item" href="{{route('admin.selectlanguages',$action = 'all')}}">All</a>
                                        <a class="dropdown-item" href="{{route('admin.selectlanguages',$action = 'active')}}">active</a>
                                        <a class="dropdown-item" href="{{route('admin.selectlanguages',$action = 'inactive')}}">inactive</a>
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
                                        <th>{{__('admin.Abbr')}}</th>
                                        <th>{{__('admin.Direction')}}</th>
                                        <th>{{__('admin.Locale')}}</th>
                                        <th>{{__('admin.Status')}}</th>
                                        <th>{{__('admin.Settings')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($language)
                        @foreach ($language as $languages)
                            <tr style="text-align: center">

                                <td class="text-bold-500">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td class="text-bold-500">{{$languages->id}}</td>
                                <td>{{$languages->name}}</td>
                                <td>{{$languages->abbr}}</td>
                                <td>{{$languages->locale}}</td>
                                <td>{{$languages->direction}}</td>
                                <td style="color:{{$languages->active == 1 ? '#0E9A00' : '#8c0615'}}">{{$languages->active == 1 ? 'Active' : 'Inactive'}}</td>
                                <td>

                                    <a alt="{{__('admin.active')}}" href="{{route('admin.activelanguages', $languages -> id )}}">
                                        <button rel="dlk" type="button" class="btn btn-{{$languages->active == 1 ? 'info' : 'danger'}}"><i class="icon-{{$languages->active == 1 ? 'lock' : 'key'}}"></i></button>
                                    </a>

                                    <a alt="{{__('admin.edit')}}" href="{{route('admin.editlanguages', $languages -> id )}}">
                                        <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>                                    </a>

                                    <a alt="{{__('admin.delete')}}" href="{{route('admin.deletelanguages', $languages -> id )}}">
                                        <button type="button" class="btn btn-danger"><i class="fa fa-close"></i></button>
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
                                        <th>{{__('admin.Abbr')}}</th>
                                        <th>{{__('admin.Direction')}}</th>
                                        <th>{{__('admin.Locale')}}</th>
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






<!-- Modal -->



@endsection
