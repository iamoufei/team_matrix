@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Almost closed</div>

                    <div class="panel-body">
                        Please click the following link to confirm your email and active your account at Team_Matrix.<br/>
                        <strong><a href="{{ $confirm_url }}">Click to confirm >>></a></strong><br/>
                        If can not click the link, you can copy the following url, and open it in your browser :<br />
                        {{ $confirm_url }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection