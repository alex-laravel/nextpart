@extends('frontend.layout.main')

@section('title', trans('labels.auth.login.title'))

@section('content')
    <div class="site__body">
        <div class="block-space block-space--layout--after-header"></div>
        <div class="block">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                        <div class="card flex-grow-1 mb-md-0 mr-0 mr-lg-3 ml-0 ml-lg-4">
                            <div class="card-body card-body--padding--2">
                                <h3 class="card-title">
                                    {{ trans('labels.auth.login.title') }}
                                </h3>

                                <form action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">{{ trans('labels.auth.login.form.login') }}</label>
                                        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ trans('labels.auth.login.form.login') }}" value="{{ old('email') }}" required autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ trans('labels.auth.login.form.password') }}</label>
                                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ trans('labels.auth.login.form.password') }}" required>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <small class="form-text text-muted">
                                            <a href="{{ route('password.request') }}">
                                                {{ trans('labels.auth.login.forgot_password') }}
                                            </a>
                                        </small>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <span class="input-check form-check-input">
                                                <span class="input-check__body">
                                                    <input class="input-check__input" type="checkbox" id="remember" name="remember" {{ old('remember') === 'on' ? 'checked' : '' }}>
                                                    <span class="input-check__box"></span>
                                                    <span class="input-check__icon"><svg width="9px" height="7px">
                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                        </svg>
                                                    </span>
                                                </span>
                                            </span>

                                            <label class="form-check-label" for="remember">
                                                {{ trans('labels.auth.login.remember_me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary mt-3">
                                            {{ trans('buttons.auth.login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection
