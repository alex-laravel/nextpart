@extends('backend.layout.main')

@section ('title', trans('labels.backend.orders.management') . ' | ' . trans('labels.backend.orders.edit'))

@section('header')
    <h1>
        <i class="fa fa-shopping-cart"></i>
        {{ trans('labels.backend.orders.management') }}
    </h1>
@endsection

@section('content')
    {{ Form::model($order, ['route' => ['backend.orders.update', $order], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

    <div class="card card-accent-warning">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.orders.edit') }}</h4>

            <div class="float-right">
                @include('backend.shop-orders.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
{{--            <div class="form-group row">--}}
{{--                {{ Form::label('title', trans('labels.backend.orders.table.title'), ['class' => 'col-lg-2 control-label']) }}--}}

{{--                <div class="col-lg-10">--}}
{{--                    {{ Form::text('title', $order->title, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('labels.backend.orders.table.title')]) }}--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="form-group row">--}}
{{--                {{ Form::label('description', trans('labels.backend.orders.table.description'), ['class' => 'col-lg-2 control-label']) }}--}}

{{--                <div class="col-lg-10">--}}
{{--                    {{ Form::text('description', $order->description, ['class' => 'form-control', 'maxlength' => '455', 'placeholder' => trans('labels.backend.orders.table.description')]) }}--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

        <div class="card-footer">
{{--            {{ Form::submit(trans('buttons.general.save'), ['class' => 'btn btn-success btn-sm']) }}--}}
            <a href="{{ route('backend.orders.index') }}" class="btn btn-secondary btn-sm">{{ trans('buttons.general.cancel') }}</a>
        </div>
    </div>

    {{ Form::close() }}
@endsection
