@extends('frontend.layout.main')

@section('meta_title', trans('meta.account.profile.title'))
@section('meta_description', trans('meta.account.profile.description'))
@section('meta_keywords', trans('meta.account.profile.keywords'))

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
                                <h5>{{ trans('meta.account.profile.title') }}</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body card-body--padding--2">
                                {{ Form::model($user, ['route' => ['frontend.account.profile'], 'method' => 'PATCH']) }}
                                <div class="row no-gutters">
                                    <div class="col-12 col-lg-7 col-xl-6">
                                        <div class="form-group">
                                            {{ Form::label('email', trans('labels.frontend.account.profile.email')) }}
                                            {{ Form::email('email', $user->email, ['class' => 'form-control', 'id' => 'email', 'placeholder' => trans('labels.frontend.account.profile.email'), 'disabled' => true]) }}
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('first_name', trans('labels.frontend.account.profile.first_name')) }}
                                            {{ Form::text('first_name', $user->first_name, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => trans('labels.frontend.account.profile.first_name'), 'maxlength' => 255]) }}
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('last_name', trans('labels.frontend.account.profile.last_name')) }}
                                            {{ Form::text('last_name', $user->last_name, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => trans('labels.frontend.account.profile.last_name'), 'maxlength' => 255]) }}
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('phone', trans('labels.frontend.account.profile.phone')) }}
                                            {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => trans('labels.frontend.account.profile.phone'), 'maxlength' => 13]) }}
                                        </div>

                                        <div class="form-group mb-0">
                                            {{ Form::submit(trans('buttons.general.save'), ['class' => 'btn btn-primary mt-3']) }}
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
