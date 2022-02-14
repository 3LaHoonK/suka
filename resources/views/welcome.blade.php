@extends('layouts.app')

@section('welcome')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
