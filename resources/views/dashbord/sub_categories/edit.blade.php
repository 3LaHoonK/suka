@extends('layouts.adminStatic')
@section('editSubcat')



<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin.Home')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.languages')}}">{{__('admin.sub_categories')}}</a></li>
                <li class="breadcrumb-item active">{{__('admin.edit-sub-cat')}}</li>
            </ol>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form id="step-form-horizontal" class="step-form-horizontal"  method="post"  action="{{route('admin.editsubcategoriescheck',$main->id)}}}" enctype="multipart/form-data">
                    <div>
                        @csrf
                        @isset($main)
                            @if($main->translation_of > 0)
                                {{$conn = 0}}
                            @endif
                                        <h4>{{__('admin.cat-' . $main->language->abbr)}}</h4>
                                        <section>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <span>{{__('admin.name-'.$main->language->abbr)}}</span>
                                                        <input name="{{ $main ->translation_of > 0 ? 'category[$conn][name]' : 'name'}}" type="text"  class="form-control" required value="{{$main->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <span>{{__('admin.slug-'.$main->language->abbr)}}</span>
                                                        <input name="{{ $main ->translation_of > 0 ? 'category[$conn][slug]' : 'slug'}}"
                                                               type="text"  class="form-control" value="{{$main -> slug}}" required>
                                                        <input hidden name="{{ $main ->translation_of > 0 ? 'category[$conn][lang]' : 'lang'}}"
                                                               type="text"  class="form-control" value="{{$main->language->abbr}}" required>
                                                        <input hidden name="{{ $main ->translation_of > 0 ? 'category[$conn][lang_id]' : 'lang_id'}}"
                                                               type="text"  value="{{$main->lang_id}}">
                                                        <input hidden name="{{ $main ->translation_of > 0 ? 'category[$conn][translation_of]' : 'translation_of'}}"
                                                               type="text"  value="{{$main->translation_of}}">

                                                    </div>

                                                </div>

                                                <div class="col-lg-6">

                                                    <div class="basic-form" >
                                                            <div class="form-group" style="text-align: center">
                                                                <div class="radio mb-2">
                                                                    <h5>{{__('admin.active-cat?')}}</h5>
                                                                    <label style="color: green"><input {{$main->active == '1' ? 'checked' : 'un'}} type="radio"
                                                                           name="{{ $main ->translation_of > 0 ? 'category[$conn][active]' : 'active'}}" value="1">{{__('admin.active')}}</label>
                                                                    <label style="color: red"><input {{$main->active == '0' ? 'checked' : 'un'  }} type="radio"
                                                                           name="{{ $main ->translation_of > 0 ? 'category[$conn][active]' : 'active'}}" value="0">{{__('admin.inactive')}}</label>
                                                                </div>
                                                            </div>
                                                    </div>

                                                </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <span>{{__('admin.image-'.$main->translation_lang)}}</span>
                                                            <input type="file" name="image" class="form-control"  value="{{$main->image}}">
                                                        </div>
                                                    </div>
                                            </div>
                                        </section>

                        @endisset
                        @isset($other)
                            @foreach ($other as $conn => $categories)
                            <h4>{{__('admin.cat-' . $categories->translation_lang)}}</h4>
                            <section>
                                <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <span>{{__('admin.name-'.$categories->translation_lang)}}</span>
                                                <input name="category[{{$conn}}][name]" type="text"  class="form-control" required value="{{$categories->name}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <span>{{__('admin.name-'.$categories->translation_lang)}}</span>
                                                <input name="category[{{$conn}}][slug]" type="text"  class="form-control" value="{{$categories->slug}}" required>
                                                <input hidden name="category[{{$conn}}][lang_id]"  type="text"  value="{{$categories->lang_id}}">
                                                <input hidden name="category[{{$conn}}][lang]"  type="text"  value="{{$categories->language->abbr}}">
                                                <input hidden name="category[{{$conn}}][translation_of]"  type="text"  value="{{$categories->translation_of}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="basic-form" >


                                                    <div class="form-group" style="text-align: center">
                                                        <div class="radio mb-2">
                                                            <h5>{{__('admin.active-cat?')}}</h5>
                                                            <label style="color: green"><input {{$categories->active == '1' ? 'checked' : ''}}
                                                                type="radio" name="category[{{$conn}}][active]" value="1">{{__('admin.active')}}</label>
                                                            <label style="color: red"><input {{$categories->active == '0' ? 'checked' : ''  }}
                                                                type="radio" name="category[{{$conn}}][active]" value="0">{{__('admin.inactive')}}</label>
                                                        </div>
                                                    </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <span>{{__('admin.name-'.$categories->translation_lang)}}</span>
                                            <input type="file" name="category[{{$conn}}][image]" class="form-control" value="{{$categories->image}}">
                                        </div>
                                    </div>
                                </div>

                            </section>
                            @endforeach
                        @endisset
                        <h4>Check Up</h4>
                            <section>
                                <div class="row" style="text-align: center ;margin-top: 2rem"  >

                                    <div class="col-lg-12" >
                                        <div class="form-group">
                                            <h4>Are you ready to change caregories</h4>
                                        </div>
                                        <div class="form-group"><br>
                                            <input class="btn btn-primary btn-block form-control" type="submit"  value="{{__('admin.edite')}}">
                                        </div>
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





















{{--

<div class="page-heading">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-left">
            <li class="breadcrumb-item"><a href="#">{{__('admin.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.viewcategories')}}">{{__('admin.main_categories')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">edit</li>
        </ol>
    </nav>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-12 mb-4">
            <form method="post" action="{{route('admin.editcategoriescheck',$categorie->id)}}">
                @csrf
                    <div class="form-group">
                        <label for="disabledInput">{{__('admin.Language Name')}}</label>
                        <input name="name" type="text" class="form-control" id="readonlyInput" value="{{$categorie->name}}">
                    </div>
                    @error ('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="disabledInput">{{__('admin.Translation_Lang')}}</label>
                        <input name="translation_lang" type="text" class="form-control" id="readonlyInput" value="{{$categorie->translation_lang}}">
                    </div>
                    @error ('translation_lang')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group ">
                        <label for="disabledInput">{{__('admin.Translation_Of')}}</label>
                        <input name="translation_of" type="text" class="form-control" id="readonlyInput"  value="{{$categorie->translation_of}}">
                    </div>
                    @error ('translation_of')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group ">
                        <label for="disabledInput">{{__('admin.Slug')}}</label>
                        <input name="slug" type="text" class="form-control" id="readonlyInput"  value="{{$categorie->slug}}">
                    </div>
                    @error ('slug')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group ">
                        <label for="disabledInput">{{__('admin.image')}}</label>
                        <input name="image" type="input" class="form-control" id="readonlyInput"  value="{{$categorie->image}}">
                    </div>
                    @error ('image')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="disabledInput">{{__('admin.Categories-state')}}</label>
                    </div>
                    <div class="form-check form-switch">
                        <input name="active" class="form-check-input" {{$categorie->active == '1' ? 'checked' : ''}} type="checkbox" value="1">
                        <label class="form-check-label" for="flexSwitchCheckDefault">{{$categorie->active == '1' ? 'Is Active' : 'Is Inactive'}}</label>
                    </div>
                    <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-primary me-1 mb-1">{{__('admin.edit')}}</button>
                    </div>

            </form>
        </div>
    </div>

</div> --}}

@endsection
