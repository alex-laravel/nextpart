@extends('frontend.layout.main')

@section('meta_title', trans('meta.account.password.title'))
@section('meta_description', trans('meta.account.password.description'))
@section('meta_keywords', trans('meta.account.password.keywords'))

@section('content')
    <div class="site__body">
        <div class="block-space block-space--layout--after-header"></div>
        <div class="block">
            <div class="container container--max--xl">
                <div class="row">
                    <div class="col-12 col-lg-3 d-flex">
                        @include('frontend.account.partials.navigation')
                    </div>
                    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ trans('meta.account.password.title') }}</h5>
                            </div>

                            <div class="card-divider"></div>

                            <div class="card-body card-body--padding--2">
                                {{ Form::open(['route' => 'frontend.account.password', 'method' => 'PATCH']) }}
                                <div class="row no-gutters">
                                    <div class="col-12 col-lg-7 col-xl-6">
                                        <div class="form-group">
                                            {{ Form::label('current_password', trans('labels.frontend.account.password.current_password')) }}
                                            {{ Form::password('current_password', ['class' => 'form-control', 'id' => 'current_password', 'placeholder' => trans('labels.frontend.account.password.current_password'), 'maxlength' => 250]) }}
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('new_password', trans('labels.frontend.account.password.new_password')) }}
                                            {{ Form::password('new_password', ['class' => 'form-control', 'id' => 'new_password', 'placeholder' => trans('labels.frontend.account.password.new_password'), 'maxlength' => 250]) }}
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('new_password_confirmation', trans('labels.frontend.account.password.new_confirm_password')) }}
                                            {{ Form::password('new_password_confirmation', ['class' => 'form-control', 'id' => 'new_password_confirmation', 'placeholder' => trans('labels.frontend.account.password.new_confirm_password'), 'maxlength' => 250]) }}
                                        </div>

                                        <div class="form-group mb-0">
                                            {{ Form::submit(trans('buttons.general.change'), ['class' => 'btn btn-primary mt-3']) }}
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection
