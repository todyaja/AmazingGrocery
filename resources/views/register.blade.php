@extends('master')
@section('content')
    <div class="h-100 w-100 d-flex align-items-center justify-content-center">
        <div class="tab-content w-50">
            <h1>{{__('text.register')}}</h1>
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form action="{{ url('postRegist') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">{{__('text.first_name')}}</label>
                                <input type="text" id="loginName" name="firstName" class="form-control" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Email</label>
                                <input type="text" id="loginName" name="email" class="form-control" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-check-label mb-2" for="gender">{{__('text.gender')}}</label><br>
                                @foreach ($gender as $g)
                                <input class="form-check-input" type="radio" id="{{$g->id}}" name="gender" value="{{$g->id}}">
                                <label  class="form-label" for="{{$g->id}}">{{$g->gender_desc}}</label>
                                @endforeach
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginPassword">{{__('text.password')}}</label>
                                <input type="password" id="loginPassword" name="password" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">{{__('text.last_name')}}</label>
                                <input type="text" id="loginName" name="lastName" class="form-control" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="role">{{__('text.role')}}</label>
                                <select class="form-select" name="role" id="role">
                                    @foreach ($role as $r)
                                    <option value="{{$r->id}}">{{$r->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-outline mb-4">
                                <label for="formFile" class="form-label">{{__('text.display_picture')}}</label>
                                <input class="form-control" name="displayPicture" type="file" id="formFile">
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="confirmPassword">{{__('text.confirm_password')}}</label>
                                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div>
                        @if ($errors->any())
                            <span
                                class="bg-danger text-white w-100 d-flex justify-content-center mb-3">{{ $errors->first() }}</span>
                        @endif
                    </div>
                    <div class="w-100 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-block mb-4">{{__('text.register')}}</button>
                    </div>

                    <div class="text-center">
                        <p>{{__('text.already_have_account')}}<a href="/login">{{__('text.login')}}</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
