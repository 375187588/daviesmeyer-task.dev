@extends('layouts.home')
@section('content')

<div class="col-lg-4">
    <fieldset>
        <legend>{{ trans('home.contact') }}</legend>
        {!! Form::open(['route' => ['home.mail']]) !!}

        <div class="form-group">
            {!! Form::label('name', trans('home.name')) !!}
            {!! Form::text('name', '', ['class' => 'form-control']) !!}
            <span class="text-danger">
                  {{ $errors->first('name') }}
            </span>
        </div>

        <div class="form-group">
            {!! Form::label('email', trans('home.email')) !!}
            {!! Form::text('email', '', ['class' => 'form-control']) !!}
            <span class="text-danger">
                  {{ $errors->first('email') }}
            </span>
        </div>

        <div class="form-group">
            {!! Form::label('phone', trans('home.phone')) !!}
            {!! Form::text('phone', '', ['class' => 'form-control']) !!}
            <span class="text-danger">
                {{ $errors->first('phone') }}
            </span>
        </div>

        <div class="form-group">
            {!! Form::label('address', trans('home.address')) !!}
            {!! Form::text('address', '', ['class' => 'form-control']) !!}
            <span class="text-danger">
                {{ $errors->first('address') }}
            </span>
        </div>

        <div class="form-group">
            {!! Form::label('message', trans('home.message')) !!}
            {!! Form::textarea('message', '', ['class' => 'form-control']) !!}
            <span class="text-danger">
                {{ $errors->first('message') }}
            </span>
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </fieldset>
</div>

@stop