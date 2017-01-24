@extends('layouts.home')
@section('content')

<div class="row" style="margin-top: 10%; margin-bottom: 10%">
    <div class="center">
        <fieldset class="col-lg-4 col-lg-offset-4">
            <legend>{{ trans('passwords.typenew') }}</legend>

            {!! Form::open(['route' => ['reset-password'], 'name' => 'form']) !!}

            <div class="form-group">
                {{ Form::hidden('secret_token', $secret_token) }}

                <div class="form-group">
                    {!! Form::label('password', trans('passwords.newpass')) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    <span class="text-danger">
                  {{ $errors->first('password') }}
                </span>
                </div>

                <div class="form-group">
                    {!! Form::label('retype', trans('passwords.retype')) !!}
                    {!! Form::password('retype', ['class' => 'form-control']) !!}
                    <span class="text-danger">
                  {{ $errors->first('retype') }}
                </span>
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit(trans('login.send'), ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </fieldset>
    </div>
</div>

@stop
