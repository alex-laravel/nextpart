@extends('backend.layout.main')

@section ('title', trans('labels.backend.distributor-storages.management') . ' | ' . trans('labels.backend.distributor-storages.create'))

@section('header')
    <h1>
        <i class="fas fa-pallet"></i>
        {{ trans('labels.backend.distributor-storages.management') }}
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'backend.distributor-storages.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}

    <div class="card card-accent-warning">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.distributor-storages.create') }}</h4>

            <div class="float-right">
                @include('backend.distributor-storages.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                {{ Form::label('distributor_id', trans('labels.backend.distributor-storages.table.distributor'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::select('distributor_id', $distributorsList, false, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div>
            </div>

            <div class="form-group row">
                {{ Form::label('title', trans('labels.backend.distributor-storages.table.title'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'placeholder' => trans('labels.backend.distributor-storages.table.title')]) }}
                </div>
            </div>

            <div class="form-group row">
                {{ Form::label('description', trans('labels.backend.distributor-storages.table.description'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('description', null, ['class' => 'form-control', 'maxlength' => '455', 'placeholder' => trans('labels.backend.distributor-storages.table.description')]) }}
                </div>
            </div>

            <div class="form-group row">
                {{ Form::label('delivery_days', trans('labels.backend.distributor-storages.table.delivery_days'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::select('delivery_days', $deliveryDaysList, null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>

            <div class="form-group row">
                {{ Form::label('import_sequence_number', trans('labels.backend.distributor-storages.table.import_sequence_number'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('import_sequence_number', null, ['class' => 'form-control', 'required' => 'required', 'maxlength' => '3', 'placeholder' => trans('labels.backend.distributor-storages.table.import_sequence_number')]) }}
                </div>
            </div>
        </div>

        <div class="card-footer">
            {{ Form::submit(trans('buttons.general.save'), ['class' => 'btn btn-success btn-sm']) }}
            <a href="{{ route('backend.distributor-storages.index') }}" class="btn btn-secondary btn-sm">{{ trans('buttons.general.cancel') }}</a>
        </div>
    </div>

    {{ Form::close() }}
@endsection
