@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{--<div class="alert {{ session('alert_class') }}" role="alert">--}}
                    {{--{{ session('alert_message') }}--}}
                {{--</div>--}}
                <div>
                    {{ $user_id }} <br/>
                    {{ $level }}<br/>
                    {{ $power }}
                </div>
            </div>
        </div>
    </div>
@endsection