@extends('layouts.home')
@section('content')

<div class="row" style="margin-top: 10%; margin-bottom: 10%">
    <div class="col-md-4 col-md-offset-4">
        <fieldset ng-controller="UserCtrl">
            <legend>{{ trans('login.forgotpass') }}</legend>

            {!! Form::open(['route' => ['forgot-password'], 'name' => 'form']) !!}

            <div class="form-group">
                {!! Form::label('email', trans('login.email')) !!}
                {!! Form::text('email', '', ['class' => 'form-control']) !!}
                <span class="text-danger">
                  {{ $errors->first('email') }}
                </span>
            </div>

            <div class="form-group">
                <a href="{{ route('admin.login') }}" class="btn btn-default">{{ trans('login.back') }}</a>
                {!! Form::submit(trans('login.send'), ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </fieldset>
    </div>
</div>

@stop
