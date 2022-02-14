@extends('layouts.adminStatic')
@section('addcat')


<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashbord')}}">{{__('admin.Home')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.languages')}}">{{__('admin.main_categories')}}</a></li>
                <li class="breadcrumb-item active">{{__('admin.add-cat')}}</li>
            </ol>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form id="step-form-horizontal" class="step-form-horizontal"  method="post"  action="{{route('admin.addcategoriescheck')}}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        @isset($activeLanguage)


                        @foreach ($activeLanguage as $conn => $activeLanguages  )
                        <h4>{{$activeLanguages->name}}</h4>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="category[{{$conn}}][name]" type="text"  class="form-control"
                                        placeholder="{{__('admin.NAME') . __('admin.' . $activeLanguages->abbr)}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="category[{{$conn}}][slug]" type="text"  class="form-control"
                                        placeholder="{{__('admin.Slug') . __('admin.' . $activeLanguages->abbr)}}" required>
                                        <input hidden name="category[{{$conn}}][lang_id]"  type="text"  value="{{$activeLanguages->id}}">
                                        <input hidden name="category[{{$conn}}][lang]"  type="text"  value="{{$activeLanguages->abbr}}">
                                    </div>
                                </div>
                                <div class="col-lg-12" style="text-align: center ;top: 50px">
                                    <div class="form-group" >
                                        <div class="form-group" >
                                            <div class="radio mb-2">

                                                <label class="col-lg-1" style="color:green;"><input  checked  type="radio" name="category[{{$conn}}][active]" value="1">{{__('admin.active')}}</label>
                                                <label class="col-lg-1" style="color:red"><input   type="radio" name="category[{{$conn}}][active]" value="0">{{__('admin.inactive')}}</label>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </section>
                        @endforeach
                        @endisset
                        <h4>Image for all</h4>
                        <section>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control" placeholder="{{__('admin.image')}}" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control" value="add">
                                </div>
                            </div>
                        </section>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>






































{{-- <div class="page-heading">
    <nav aria-label="breadcrumb">
        {{-- {{$activeLanguage}} --}}
        {{-- <ol class="breadcrumb breadcrumb-left">
            <li class="breadcrumb-item"><a href="{{route('dashbord')}}">{{__(('admin.Home'))}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.languages')}}">{{__(('admin.Languages'))}}</a></li>
        </ol>
    </nav>

</div>

<h1>{{__('admin.add-cat')}}</h1>
    <div class="card-body">
    <div class="container">

            <form class="row"  method="post"  action="{{route('admin.addcategoriescheck')}}" enctype="multipart/form-data">
                @csrf
                @isset($activeLanguage)
                    @foreach ($activeLanguage as $conn => $activeLanguages  )
                        <div class="col-md-6">

                            <div class="form-group ">
                                <label for="name">{{__('admin.NAME') . __('admin.' . $activeLanguages->abbr)}}</label><br>
                                <br><input name="category[{{$conn}}][name]" type="text" class="form-control" id="name">
                            </div>
                                @error ("category.$conn.name")
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            <div class="form-group ">
                                <label for="translation_lang">{{__('admin.Translation_Lang') . __('admin.' . $activeLanguages->abbr)}}</label><br>
                                <br><input  name="category[{{$conn}}][translation_lang]"  type="text" class="form-control" id="translation_lang" value="{{$activeLanguages->abbr}}">
                            </div>
                                @error ("category.$conn.translation_Lang")
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;">
                                <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;">
                                    <span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 42px;">ON</span>
                                    <span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span>
                                    <span class="bootstrap-switch-handle-off bootstrap-switch-danger" style="width: 42px;">OFF</span>
                                    <input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch="" data-off-color="danger" data-on-color="success">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="disabledInput">{{__('admin.Categories-state')}}</label><br>
                            </div>
                            <div class="form-check form-switch">
                                    <input name="category[{{$conn}}][active]" class="bootstrap-switch-handle-on bootstrap-switch-success" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">{{__('admin.Categories-Active-or-Inactive')}}</label><br>
                            </div>
                        </div>
                    @endforeach
                @endisset
                    <div class="col-md-12">
                            <div class="form-group">
                                <br><label  for="disabledInput">{{__('admin.image-cat')}}</label>
                                <br><input name="image" type="file" class="form-control" id="readonlyInput">
                            </div>
                                @error ("image")
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                    </div>
                    <div style="display:fixed" class="row justify-content-center form-group">
                        <br>
                        <button type="submit" class="btn btn-primary me-1 mb-1">{{__('admin.add')}}</button>
                    </div>


            </form>

        </div>
    </div> --}}


@endsection
