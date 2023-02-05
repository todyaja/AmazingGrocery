@extends('master')
@section('content')
    <div class="h-100 w-100 d-flex align-items-center justify-content-center">
        <div class="border border-5 rounded-circle p-5 border-warning d-flex align-items-center justify-content-center"
            style="border-radius: 50%; width: 800px; height: 800px">
            <h1>{{__('text.logout_success')}}</h1>
        </div>
    </div>
@endsection
