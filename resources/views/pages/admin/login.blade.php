
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>Rosella</h4></a>
                                @if (Session::has('error'))
                                  <div class="alert alert-danger"><i class="bi bi-exclamation-circle"></i>
                                      {{__('admin.Wrong-username-or-password')}}
                                  </div>
                                @endif
                                <form class="mt-5 mb-5 login-input" method="post" action="{{route('admin.checkLogin')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control"  placeholder="{{__('admin.Enter-Your-Email')}}" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="{{__('admin.Enter-Your-Password')}}">
                                    </div>
                                    <div class="form-group">
                                        <input name="remember_me" type="checkbox" class="" >
                                        <label>{{__('admin.Keep-me-logged-in')}}</label>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">{{__('admin.Log-in')}}</button>
                                </form>
                                <p class="mt-5 login-form__footer">{{__('admin.Forgot-password?')}}<a href="page-register.html" class="text-primary">Forget</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('assets/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/gleek.js')}}"></script>
    <script src="{{asset('assets/js/styleSwitcher.js')}}"></script>
</body>
</html>
