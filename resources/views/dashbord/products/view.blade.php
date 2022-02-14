@extends('layouts.adminStatic')
@section('title')
    {{__('admin/products.vendor-list')}}
@endsection
@section('viewProduct')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/vendor.vendor-list')}}</h1>
                        <button hidden type="button" id="alert" class="btn btn-success swalDefaultSuccess">
                            {{Session::get('success')}}
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/vendor.home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.vendors')}}">{{__('admin/vendor.vendor')}}</a></li>
                            <li class="breadcrumb-item active">{{__('admin/vendor.vendor-list')}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    <div class="col-12">
        @include('layouts.alert')
    </div>
    <div class="card">
        <div class="card-header text-center col-12">
            <a href="{{route('admin.createFormVendors')}}">
                <button class="btn btn-primary text-center float-left">
                    <i class="fas fa-plus"></i>
                    {{__('admin/vendor.add-vendor')}}
                </button>
            </a>
            <div class="float-right">
                <td class="text-right py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right text-center" role="menu">
                                <a href="{{route('admin.vendors')}}" class="dropdown-item">{{__('admin/vendor.all-vendor')}}</a>
                                <a href="{{route('admin.selectVendors' , $action='active')}}" class="dropdown-item">{{__('admin/vendor.active-vendor')}}</a>
                                <a href="{{route('admin.selectVendors' , $action='inactive')}}" class="dropdown-item">{{__('admin/vendor.inactive-vendor')}}</a>
                            </div>
                        </div>

                    </div>
                </td>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline " role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">{{__('admin/vendor.id')}}</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">{{__('admin/vendor.firstname')}}</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">{{__('admin/vendor.lastname')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('admin/vendor.store-name')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('admin/vendor.slug')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">{{__('admin/vendor.status')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{__('admin/vendor.setting')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                        @isset($data)
                            @foreach ($data as $dataArray)
                            <tr role="row" class="odd text-center">
                                <td>{{$dataArray->id}}</td>
                                <td>{{$dataArray->firstName}}</td>
                                <td>{{$dataArray->lastName}}</td>
                                <td>{{$dataArray->store_name}}</td>
                                <td>{{$dataArray->slug}}</td>
                                <td style="color:{{$dataArray->is_active == 0 ? '#0E9A00' : '#8c0615'}}">
                                    <span class='badge badge-{{statusColor($dataArray->is_active)}}'>{{__('admin/vendor.'.status($dataArray->is_active))}}</span>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <!--detalis action-->
                                                <button type="button" class="btn btn-default ">
                                                <a href="{{route('admin.detailVendors',$dataArray->slug)}}" class="dropdown-item"><i class="fa fa-eye"></i>
                                                    {{__('admin/vendor.detail')}}</a>
                                                </button>
                                            <!--edit action-->
                                                <button type="button" class="btn btn-default" >
                                                <a href="{{route('admin.editVendors',$dataArray->slug)}}" class="dropdown-item"><i class="fa fa-edit"></i>
                                                    {{__('admin/vendor.edit')}}</a>
                                                </button>
                                            <!--status action-->
                                                <button type="button" class="btn btn-default">
                                                <a href="{{route('admin.activeVendors',$dataArray->id)}}" class="dropdown-item"><i class="fa fa-key"></i>
                                                    {{__('admin/vendor.' . statusSetting($dataArray->is_active))}}</a>
                                                </button>
                                            <!--delete action-->
                                                <button type="button" class="btn btn-default">
                                                    <a href="{{route('admin.deleteVendors',$dataArray->id)}}" class="dropdown-item"><i class="fa fa-trash"></i>
                                                        {{__('admin/vendor.delete')}}</a>
                                                </button>


                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endisset

                            </tbody>
                            <tfoot>
                            <tr>

                                <th rowspan="1" colspan="1">{{__('admin/vendor.id')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/vendor.firstname')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/vendor.lastname')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/vendor.store-name')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/vendor.slug')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/vendor.status')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/vendor.setting')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</div>

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="content" class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@endsection
