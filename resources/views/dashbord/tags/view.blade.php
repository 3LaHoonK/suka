@extends('layouts.adminStatic')
@section('title')
    {{__('admin/tag.tag-list')}}
@endsection
@section('viewTag')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/tag.tag-list')}}</h1>
                        <button hidden type="button" id="alert" class="btn btn-success swalDefaultSuccess">
                            {{Session::get('success')}}
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/tag.home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.tags')}}">{{__('admin/tag.tag')}}</a></li>
                            <li class="breadcrumb-item active">{{__('admin/tag.tag-list')}}</li>
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
                    {{__('admin/tag.add-tag')}}
                </button>
            </a>
            <div class="float-right">
                <td class="text-right py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right text-center" role="menu">
                                <a href="{{route('admin.tags')}}" class="dropdown-item">{{__('admin/tag.all-tag')}}</a>
                                <a href="{{route('admin.selectTags' , $action='active')}}" class="dropdown-item">{{__('admin/tag.active-tag')}}</a>
                                <a href="{{route('admin.selectTags' , $action='inactive')}}" class="dropdown-item">{{__('admin/tag.inactive-tag')}}</a>
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
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">{{__('admin/tag.id')}}</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">{{__('admin/tag.slug')}}</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">{{__('admin/tag.name')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('admin/tag.parent_name')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">{{__('admin/tag.status')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{__('admin/tag.setting')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                        @isset($data)
                            @foreach ($data as $dataArray)
                            <tr role="row" class="odd text-center">
                                <td>{{$dataArray->id}}</td>
                                <td>{{$dataArray->slug}}</td>
                                <td>{{$dataArray->name}}</td>
                                @if($dataArray->brand_id == true)
                                    <td>{{$dataArray->brandName->name}} |<a href="{{route('admin.brands')}}">  {{__('admin/tag.bran')}}</a></td>
                                @endif
                                @if($dataArray->category_id == true)
                                    <td>{{$dataArray->categoryName->name}} |<a href="{{route('admin.categories')}}">  {{__('admin/tag.cat')}}</a></td>
                                @endif
                                @if($dataArray->product_id == true)
                                    <td>{{$dataArray->productName->name}} |<a href="{{route('admin.products')}}">  {{__('admin/tag.pro')}}</a></td>
                                @endif
                                <td style="color:{{$dataArray->is_active == 0 ? '#0E9A00' : '#8c0615'}}">
                                    <span class='badge badge-{{statusColor($dataArray->is_active)}}'>{{__('admin/tag.'.status($dataArray->is_active))}}</span>
                                </td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <!--detalis action-->
                                                <button type="button" class="btn btn-default ">
                                                <a href="{{route('admin.detailTags',$dataArray->slug)}}" class="dropdown-item"><i class="fa fa-eye"></i>
                                                    {{__('admin/tag.detail')}}</a>
                                                </button>
                                            <!--edit action-->
                                                <button type="button" class="btn btn-default" >
                                                <a href="{{route('admin.editTags',$dataArray->slug)}}" class="dropdown-item"><i class="fa fa-edit"></i>
                                                    {{__('admin/tag.edit')}}</a>
                                                </button>
                                            <!--status action-->
                                                <button type="button" class="btn btn-default">
                                                <a href="{{route('admin.activeTags',$dataArray->id)}}" class="dropdown-item"><i class="fa fa-key"></i>
                                                    {{__('admin/tag.' . statusSetting($dataArray->is_active))}}</a>
                                                </button>
                                            <!--delete action-->
                                                <button type="button" class="btn btn-default">
                                                    <a href="{{route('admin.deleteTags',$dataArray->id)}}" class="dropdown-item"><i class="fa fa-trash"></i>
                                                        {{__('admin/tag.delete')}}</a>
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

                                <th rowspan="1" colspan="1">{{__('admin/tag.id')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/tag.slug')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/tag.name')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/tag.parent_name')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/tag.status')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/tag.setting')}}</th>
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
