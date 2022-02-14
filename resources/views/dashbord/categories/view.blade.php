@extends('layouts.adminStatic')
@section('title')
    {{__('admin/category.viewTitle-'.$type)}}
@endsection
@section('viewCat')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('admin/category.category-' . $type)}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/category.home')}}</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('admin/categories/'.$type)}}">{{__('admin/category.category-'.$type)}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin/category.list')}}</li>
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
            <a href="{{route('admin.createFormCategories',$type)}}">
                <button class="btn btn-primary text-center float-left">
                    <i class="fas fa-plus"></i>
                    {{__('admin/category.add-cat-'.$type)}}
                </button>
            </a>
            <div class="float-right">
                <td class="text-right py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right text-center" role="menu">
                                <a href="{{route('admin.categories',$type)}}" class="dropdown-item">كل الاقسام الفرعية</a>
                                <a href="{{route('admin.selectCategories',[$type,$action='active'])}}" class="dropdown-item">الاقسام النشطة</a>
                                <a href="{{route('admin.selectCategories',[$type,$action='inactive'])}}" class="dropdown-item">الاقسام الغير نشطة</a>
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
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">{{__('admin/category.id')}}</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">{{__('admin/category.name')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('admin/category.image')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('admin/category.slug')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">{{__('admin/category.status')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{__('admin/category.setting')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                        @isset($category)
                            @foreach ($category as $categories)
                            <tr role="row" class="odd text-center">
                                <td>{{$categories->id}}</td>
                                <td>{{$categories->name}}</td>
                                <td><img class="img-circle" style="height: 80px ; width:80px" src="{{ asset('assets\image\avatar2.png')}}" alt=""></td>
                                <td>{{$categories->slug}}</td>
                                <td style="color:{{$categories->is_active == 0 ? '#0E9A00' : '#8c0615'}}">
                                    <span class='badge badge-{{statusColor($categories->is_active)}}'>{{__('admin/category.'.status($categories->is_active))}}</span>
                                </td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <!--detalis action-->
                                                <button type="button" class="btn btn-default ">
                                                <a href="{{route('admin.detailCategories',[$type,$categories->id])}}" class="dropdown-item"><i class="fa fa-eye"></i>
                                                    {{__('admin/category.detail')}}</a>
                                                </button>
                                            <!--edit action-->
                                                <button type="button" class="btn btn-default" >
                                                <a href="{{route('admin.editCategories',[$type,$categories->slug])}}" class="dropdown-item"><i class="fa fa-edit"></i>
                                                    {{__('admin/category.edit')}}</a>
                                                </button>
                                            <!--status action-->
                                                <button type="button" class="btn btn-default">
                                                <a href="{{route('admin.activeCategories',[$type,$categories->id])}}" class="dropdown-item"><i class="fa fa-key"></i>
                                                    {{__('admin/category.' . statusSetting($categories->is_active))}}</a>
                                                </button>
                                            <!--delete action-->
                                                <button type="button" class="btn btn-default">
                                                    <a href="{{route('admin.deleteCategories',[$type,$categories->id])}}" class="dropdown-item"><i class="fa fa-trash"></i>
                                                        {{__('admin/category.delete')}}</a>
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

                                <th rowspan="1" colspan="1">{{__('admin/category.id')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/category.name')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/category.image')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/category.slug')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/category.status')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/category.setting')}}</th>
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
