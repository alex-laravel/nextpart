@extends('backend.layout.main')

@section ('title', trans('labels.backend.price_schemes.management') . ' | ' . trans('labels.backend.price_schemes.edit'))

@section('header')
    <h1>
        <i class="far fa-money-bill-alt"></i>
        {{ trans('labels.backend.price_schemes.management') }}
    </h1>
@endsection

@section('content')
    {{ Form::model($priceScheme, ['route' => ['backend.price-schemes.update', $priceScheme], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

    <div class="card card-accent-warning">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.price_schemes.edit') }}</h4>

            <div class="float-right">
                @include('backend.price-schemes.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                {{ Form::label('price_from', trans('labels.backend.price_schemes.table.price_from'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('price_from', $priceScheme->price_from, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('labels.backend.price_schemes.table.price_from')]) }}
                </div>
            </div>

            <div class="form-group row">
                {{ Form::label('price_to', trans('labels.backend.price_schemes.table.price_to'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('price_to', $priceScheme->price_to, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('labels.backend.price_schemes.table.price_to')]) }}
                </div>
            </div>

            <div class="form-group row">
                {{ Form::label('percentage', trans('labels.backend.price_schemes.table.percentage'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('percentage', $priceScheme->percentage, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('labels.backend.price_schemes.table.percentage')]) }}
                </div>
            </div>
        </div>

        <div class="card-footer">
            {{ Form::submit(trans('buttons.general.save'), ['class' => 'btn btn-success btn-sm']) }}
            <a href="{{ route('backend.price-schemes.index') }}" class="btn btn-secondary btn-sm">{{ trans('buttons.general.cancel') }}</a>
        </div>
    </div>

    {{ Form::close() }}
@endsection
