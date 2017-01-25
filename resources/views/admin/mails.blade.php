@extends('layouts.admin')
@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <div class="page-header">
        <h3>Mails</h3>
    </div>
    <div class="bs-component">
        {!! Form::open(['route' => ['admin.mail.search'], 'class' => 'form-inline']) !!}

        <div class="form-group">
            {!! Form::label('Search', null) !!}
            {!! Form::text('term', '', ['class' => 'form-control']) !!}
        </div>


        {!! Form::close() !!}
        <div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Massage</th>
                    <th>Action</th>
                </tr>
                </thead>
                </thead>
                <tbody>
                @foreach ($mails as $mail)
                <tr>
                    <td>{{ $mail->name }}</td>
                    <td>{{ $mail->email }}</td>
                    <td>{{ str_limit($mail->message, 200) }}</td>
                    <td><a href="{{route('admin.mail', $mail->id)}}">
                            <button class="btn btn-primary">View</button>
                        </a>
                    </td>
                    <td><a href="{{route('admin.mail.delete', $mail->id)}}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
