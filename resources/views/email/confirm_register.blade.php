@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Almost closed</div>

                    <div class="panel-body">
                        Dear {{ $user_name }}<br />
                        Please check your email, and click confirm link to active your account.<br />
                        <strong><a href="{{ $user_email }}">Go to check the email.</a></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection