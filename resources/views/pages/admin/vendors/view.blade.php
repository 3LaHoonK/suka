@extends('layouts.adminStatic')
@section('vendors')


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
                                    <h2 class="card-title">{{__('admin.Vendors-list')}} / <a href="{{route('admin.addvendors')}}"><span>add new</span></a></h2>
                                </div>
                                <div class="col-6" >
                                    <div class="dropdown custom-dropdown float-right">
                                            <div data-toggle="dropdown" aria-expanded="false">
                                                <i class="ti-more-alt"></i>
                                            </div>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(14px, 21px, 0px);">
                                            <a class="dropdown-item" href="{{route('admin.selectvendors',$action = 'all')}}">All</a>
                                            <a class="dropdown-item" href="{{route('admin.selectvendors',$action = 'active')}}">active</a>
                                            <a class="dropdown-item" href="{{route('admin.selectvendors',$action = 'inactive')}}">inactive</a>
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
                                        <th>{{__('admin.cat-name')}}</th>
                                        <th>{{__('admin.logo')}}</th>
                                        <th>{{__('admin.address')}}</th>
                                        <th>{{__('admin.Mobile')}}</th>
                                        <th>{{__('admin.Status')}}</th>
                                        <th>{{__('admin.Settings')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($dataBack)
                        @foreach ($dataBack as $vendor)
                            <tr style="text-align: center">

                                <td class="text-bold-500">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td class="text-bold-500">{{$vendor->id}}</td>
                                <td>{{$vendor->name}}</td>
                                <td>{{$vendor->category->name}}</td>
                                <td><img  src="asset{{('assets') . $vendor->logo}}"></td>
                                <td>{{$vendor->address}}</td>
                                <td>{{$vendor->mobile}}</td>
                                <td style="color:{{$vendor->active == 1 ? '#0E9A00' : '#8c0615'}}">{{$vendor->active == 1 ? 'Active' : 'Inactive'}}</td>
                                <td class="text-bold-500">

                                    <a alt="{{__('admin.active')}}" href="{{route('admin.activeVendors', $vendor -> id )}}">
                                        <button rel="dlk" type="button" class="btn btn-{{$vendor->active == 1 ? 'info' : 'danger'}}"><i class="icon-{{$vendor->active == 1 ? 'lock' : 'key'}}"></i></button>
                                    </a>

                                    <a alt="{{__('admin.edite')}}" href="{{route('admin.editvendors', $vendor -> id )}}">
                                        <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                    </a>

                                    <a alt="{{__('admin.delete')}}" href="{{route('admin.deleteVendors', $vendor -> id )}}">
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
                                        <th>{{__('admin.EMAIL')}}</th>
                                        <th>{{__('admin.LOGO')}}</th>
                                        <th>{{__('admin.ADDRESS')}}</th>
                                        <th>{{__('admin.MOBILE')}}</th>
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



</div>



@endsection
