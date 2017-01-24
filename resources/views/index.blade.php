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
            {!! Form::label('captcha', trans('home.captcha')) !!}
            {!! app('captcha')->display()!!}
            <span class="text-danger">
                {{ $errors->first('g-recaptcha-response') }}
            </span>
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </fieldset>
</div>
<style>
    #map {
        height: 300px;
        width: 60%;
    }
</style>
<script>
    function initMap() {
        var uluru = {lat: 53.998336, lng: 10.780070};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUBWceHhpEzAlmKNfpv1-gmYCf6-cDAdo&callback=initMap">
</script>

<div class="col-lg-7 pull-right" id="map"></div>

@stop
