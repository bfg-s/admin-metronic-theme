@extends(admin_template('layouts.auth-layout'))

@section('content')

    <!--begin::Login Sign in form-->
    <div class="login-signin">
        <div class="mb-20">
            <h3 class="opacity-40 font-weight-normal">{!! __('admin.login_title') !!}</h3>
            <p class="opacity-40">{!! __('admin.login_message') !!}</p>
        </div>
        <form class="form" id="kt_login_signin_form" action="{{ route('admin.2fa') }}" target method="post">
            @csrf
            @if($session_message = session('message'))
                <div class="alert alert-custom alert-outline-danger fade show mb-5" role="alert">
                    <div class="alert-icon">
                        <i class="flaticon-warning"></i>
                    </div>
                    <div class="alert-text">{{ $session_message }}</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="ki ki-close"></i>
                            </span>
                        </button>
                    </div>
                </div>
            @endif

            <div class="form-group @error('login') has-danger @enderror">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('login') is-invalid @enderror" type="text" placeholder="{{__('admin.email')}}" name="login" autocomplete="off" />
                @error('login')
                    <div class="fv-plugins-message-container">
                        <div data-field="username" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                    </div>
                @enderror
            </div>
            <div class="form-group @error('password') has-danger @enderror">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror" type="password" placeholder="{{__('admin.password')}}" name="password" />
                @error('password')
                    <div class="fv-plugins-message-container">
                        <div data-field="username" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
                    </div>
                @enderror
            </div>
            <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                        <input type="checkbox" name="remember" />
                        <span></span>{{__('admin.remember_me')}}</label>
                </div>

            </div>
            <div class="form-group text-center mt-10">
                <button id="kt_login_signin_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">{{__('admin.sign_in')}}</button>
            </div>
        </form>
    </div>
    <!--end::Login Sign in form-->
@endsection
