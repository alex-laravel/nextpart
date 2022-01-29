@extends('backend.layout.main')

@section ('title', trans('labels.backend.distributors.management') . ' | ' . trans('labels.backend.distributors.edit'))

@section('header')
    <h1>
        <i class="fas fa-warehouse"></i>
        {{ trans('labels.backend.distributors.management') }}
    </h1>
@endsection

@section('content')
    {{ Form::model($distributor, ['route' => ['backend.distributors.update', $distributor], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

    <div class="card card-accent-warning">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.distributors.edit') }}</h4>

            <div class="float-right">
                @include('backend.distributors.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                {{ Form::label('title', trans('labels.backend.distributors.table.title'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('title', $distributor->title, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('labels.backend.distributors.table.title')]) }}
                </div>
            </div>

            <div class="form-group row">
                {{ Form::label('description', trans('labels.backend.distributors.table.description'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('description', $distributor->description, ['class' => 'form-control', 'maxlength' => '455', 'placeholder' => trans('labels.backend.distributors.table.description')]) }}
                </div>
            </div>
        </div>

        <div class="card-footer">
            {{ Form::submit(trans('buttons.general.save'), ['class' => 'btn btn-success btn-sm']) }}
            <a href="{{ route('backend.distributors.index') }}" class="btn btn-secondary btn-sm">{{ trans('buttons.general.cancel') }}</a>
        </div>
    </div>

    {{ Form::close() }}
@endsection
