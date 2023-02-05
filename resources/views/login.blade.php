@extends('master')
@section('content')
    <div class="h-100 w-100 d-flex align-items-center justify-content-center">
        <div class="tab-content w-50">
            <h1>{{__('text.login')}}</h1>
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form action="{{ url('postLogin') }}" method="POST">
                    @csrf
                    <div class="form-outline mb-4">
                        <input type="email" id="loginName" name="email" class="form-control" />
                        <label class="form-label" for="loginName">Email</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="loginPassword" class="form-control" />
                        <label class="form-label" for="loginPassword">{{__('text.password')}}</label>
                    </div>
                    @if ($errors->any())
                        <span class="bg-danger text-white w-100 d-flex justify-content-center">{{ $errors->first() }}</span>
                    @endif
                    <div class="w-100 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-block mb-4">{{__('text.login')}}</button>
                    </div>

                    <div class="text-center">
                        <p>{{__('text.not_a_member')}} <a href="/register"> {{__('text.register')}}</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
