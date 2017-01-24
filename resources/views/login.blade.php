@extends('layouts.home')
@section('content')

<div class="row" style="margin-top: 10%; margin-bottom: 10%">
    <div class="col-md-4 col-md-offset-4">
        <fieldset>

            <legend>Login</legend>
            {!! Form::open(['route' => ['auth.login'], 'name' => 'form', 'id' => 'sign-in-form']) !!}

            <div class="form-group">
                {!! Form::label('email', trans('login.email')) !!}
                {!! Form::text('email', '', ['class' => 'form-control']) !!}
                <span class="text-danger">
                  {{ $errors->first('email') }}
                </span>
            </div>

            <div class="form-group">
                {!! Form::label('password', trans('login.password')) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <span class="text-danger">
                  {{ $errors->first('password') }}
                </span>
            </div>

            <div class="form-group">
                {!! Form::submit(trans('login.login'), ['class' => 'btn btn-lg btn-primary btn-block']) !!}
            </div>

            {!! Form::close() !!}
            <hr/>
            <div class="text-right">
                <a href='{{route("forgot-password")}}'>{{ trans('login.forgotpass') }}</a>
            </div>
        </fieldset>
    </div>
</div>

@stop


