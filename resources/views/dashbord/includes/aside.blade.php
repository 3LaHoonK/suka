<aside class="main-sidebar  sidebar-dark-cyan elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('Dashbord')}}" class="brand-link text-center">
        <span class="brand-text font-weight-bold">SUKA</span>
        <span class="brand-text font-weight-light">Market</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/image/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('Dashbord')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('admin/aside.Dashboard')}}
                        </p>
                    </a>

                </li>
                {{--header  --}}
                <li class="nav-header">{{__('admin/aside.category')}}</li>
                {{--Main-categories--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="grid-outline"></ion-icon>
                        <p>
                            {{__('admin/aside.Main-Categories')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.categories',$type = "main")}}" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-Categories')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.createFormCategories',$type = "main")}}" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-Categories')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--sub-categories--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="apps-outline"></ion-icon>
                        <p>
                            {{__('admin/aside.sub_categories')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.categories',$type='sub')}}" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-sub-Categories')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.createFormCategories',$type='sub')}}" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-sub-Categories')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--header  --}}
                <li class="nav-header">{{__('admin/aside.person')}}</li>
                {{--vendors--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="people-circle-outline"></ion-icon>
                        <p>
                            {{__('admin/aside.vendors')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.vendors')}}" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-vendors')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.createFormVendors')}}" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-vendors')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--users--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="people-outline"></ion-icon>
                        <p>
                            {{__('admin/aside.users')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{App\Models\Dashbord\User::count()}}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-users')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--shipping companies--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="people-outline"></ion-icon>
                        <p>
                            {{__('admin/aside.shipping_companies')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{App\Models\Dashbord\User::count()}}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-shipping-companies')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-shipping_companies')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--roles--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="logo-laravel"></ion-icon>
                        <p>
                            {{__('admin/aside.roles')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-roles')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-roles')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--header  --}}
                <li class="nav-header">{{__('admin/aside.product')}}</li>
                {{--Productes--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                        <p>
                            {{__('admin/aside.productes')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-productes')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-productes')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--Brands--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="logo-laravel"></ion-icon>
                        <p>
                            {{__('admin/aside.brands')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.brands')}}" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-brands')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.createFormBrands')}}" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-brands')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--tags--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="logo-laravel"></ion-icon>
                        <p>
                            {{__('admin/aside.tags')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.tags')}}" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-tags')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.createFormTags')}}" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-tags')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--attributes--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="logo-laravel"></ion-icon>
                        <p>
                            {{__('admin/aside.attriburts')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.createFormTags')}}#custom-tabs-three-Category" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-attriburts')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-attriburts')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--option--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="logo-laravel"></ion-icon>
                        <p>
                            {{__('admin/aside.options')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">0</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-options')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-options')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--offers--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="pricetags-outline"></ion-icon>
                        <p>
                            {{__('admin/aside.offers')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-offers')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-offers')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--header  --}}
                <li class="nav-header">ads</li>
                {{--product-ads--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="megaphone-outline"></ion-icon>
                        <p>
                            {{__('admin/aside.product-ads')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-product-ads')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-product-ads')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--outdoor-ads--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <ion-icon name="bookmarks-outline"></ion-icon>
                        <p>
                            {{__('admin/aside.outdoor-ads')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>{{__('admin/aside.View-outdoor-ads')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>{{__('admin/aside.add-outdoor-ads')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
