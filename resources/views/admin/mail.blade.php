@extends('layouts.admin')
@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h3>Mail</h3>
    <div class="bs-component">
        <div>
            <table class="table table-striped table-hover">
                <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $mail->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $mail->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $mail->phone }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $mail->address }}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>{{ $mail->message }}</td>
                </tr>
                <tr>
                    <td><a href="{{route('admin.mails')}}">
                            <button class="btn btn-primary">Beck</button>
                        </a>
                    </td>
                    <td><a href="{{route('admin.mail.delete', $mail->id)}}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@stop
