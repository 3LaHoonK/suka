
    @if (Session::has('success'))
        <div style="text-align: center" class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if (Session::has('erorr'))
    <div style="text-align: center" class="alert alert-danger">{{Session::get('erorr')}}</div>
@endif




