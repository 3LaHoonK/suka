<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('dashbord')}}">Home 1</a></li>
                        <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                    </ul>
            </li>
            <li class="nav-label">{{__('slidbar.Category')}} </li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-globe-alt menu-icon"></i><span class="nav-text">{{__('slidbar.main-categoerys')}}</span>
                        <span class="badge badge-md gradient-7 badge-pill badge-primary">{{App\Models\mainCategorie::mainCat()->count()}}</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.viewcategories')}}">{{__('slidbar.view')}}</a></li>
                        <li><a href="{{route('admin.addcategories')}}">{{__('slidbar.add')}}</a></li>
                    </ul>
                </li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-globe-alt menu-icon"></i><span class="nav-text">{{__('slidbar.sub-categoerys')}}</span>
                        <span class="badge badge-md gradient-7 badge-pill badge-primary">{{App\Models\Dashbord\subcategories::subCat()->count()}}</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.viewsubcategories')}}">{{__('slidbar.view')}}</a></li>
                        <li><a href="{{route('admin.addsubcategories')}}">{{__('slidbar.add')}}</a></li>
                    </ul>
                </li>
            </li>
            <li class="nav-label">{{__('slidbar.Language')}} </li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i  class="icon-globe-alt menu-icon"></i><span  class="nav-text">{{__('slidbar.website-Languages')}}</span>
                        <span  class="badge badge-md gradient-7 badge-pill badge-primary">{{App\Models\language::count()}}</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.languages')}}">{{__('slidbar.view')}}</a></li>
                        <li><a href="{{route('admin.addlanguages')}}">{{__('slidbar.add')}}</a></li>
                    </ul>
                </li>
            </li>
            <li class="nav-label">{{__('slidbar.Vendor')}}</li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-globe-alt menu-icon"></i><span class="nav-text">{{__('slidbar.Vendors')}}</span>
                        <span class="badge badge-md gradient-7 badge-pill badge-primary">{{App\Models\vendor::count()}}</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.vendors')}}">{{__('slidbar.view')}}</a></li>
                        <li><a href="{{route('admin.addvendors')}}">{{__('slidbar.add')}}</a></li>
                    </ul>
                </li>
            </li>

            <li class="nav-label">{{__('slidbar.Products')}} </li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-globe-alt menu-icon"></i><span class="nav-text">{{__('slidbar.Producte')}}</span>
                        <span class="badge badge-md gradient-7 badge-pill badge-primary">0</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./layout-blank.html">{{__('slidbar.view')}}</a></li>
                        <li><a href="./layout-one-column.html">{{__('slidbar.add')}}</a></li>
                    </ul>
                </li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-globe-alt menu-icon"></i><span class="nav-text">{{__('slidbar.Brand')}}</span>
                        <span class="badge badge-md gradient-7 badge-pill badge-primary">0</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./layout-blank.html">{{__('slidbar.view')}}</a></li>
                        <li><a href="./layout-one-column.html">{{__('slidbar.add')}}</a></li>
                    </ul>
                </li>
            </li>
            <li class="nav-label">Customer </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">{{__('slidbar.customers')}}</span>
                    <span class="badge badge-md gradient-7 badge-pill badge-primary">0</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./layout-blank.html">{{__('slidbar.view')}}</a></li>
                    <li><a href="./layout-one-column.html">{{__('slidbar.add')}}</a></li>
                </ul>
            </li>
            </li>
            <li class="nav-label">{{__('slidbar.Products')}} </li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-globe-alt menu-icon"></i><span class="nav-text">{{__('slidbar.Producte')}}</span>
                        <span class="badge badge-md gradient-7 badge-pill badge-primary">0</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./layout-blank.html">{{__('slidbar.view')}}</a></li>
                        <li><a href="./layout-one-column.html">{{__('slidbar.add')}}</a></li>
                    </ul>
                </li>
            </li>
            <li class="nav-label">{{__('slidbar.Products')}} </li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-globe-alt menu-icon"></i><span class="nav-text">{{__('slidbar.Producte')}}</span>
                        <span class="badge badge-md gradient-7 badge-pill badge-primary">0</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./layout-blank.html">{{__('slidbar.view')}}</a></li>
                        <li><a href="./layout-one-column.html">{{__('slidbar.add')}}</a></li>
                    </ul>
                </li>
            </li>

        </ul>
    </div>
</div>
