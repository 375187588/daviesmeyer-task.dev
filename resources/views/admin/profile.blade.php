@extends('layouts.admin')
@section('content')

<div class="col-lg-4 col-lg-offset-2">
    <fieldset>
        <legend>{{ trans('user.profile') }}</legend>
        {!! Form::model($user, ['route' => ['admin.profile.update', $user->id]]) !!}

        {!! Form::hidden('role_id', $user->role_id) !!}

        <div class="form-group">
            {!! Form::label('email', trans('user.email')) !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            <span class="text-danger">
                {{ $errors->first('email') }}
            </span>
        </div>

        <div class="form-group">
            {!! Form::label('password', trans('user.password')) !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            <span class="text-danger">
                {{ $errors->first('password') }}
            </span>
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </fieldset>
</div>

@stop
