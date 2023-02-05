@extends('master')
@section('content')
    <div class="container py-5">
        <h3><u>{{__('text.profile')}}</u></h3>
        <form action="{{ url('updateProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex row">
                <div class="col-2">
                    <img src="{{ asset('assets/profile_picture/' . $user->display_picture) }}" alt="" srcset=""
                        style="object-fit: contain; width: 100%; height:100%">
                </div>
                <div class="col-5">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginName">{{__('text.first_name')}}</label>
                        <input type="text" value="{{ $user->first_name }}" id="loginName" name="firstName"
                            class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginName">Email</label>
                        <input type="text" value="{{ $user->email }}" id="loginName" name="email"
                            class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-check-label mb-2" for="gender">{{__('text.gender')}}</label><br>
                        @foreach ($gender as $g)
                            <input class="form-check-input" {{ $g->id == $user->gender_id ? 'checked' : '' }} type="radio"
                                id="{{ $g->id }}" name="gender" value="{{ $g->id }}">
                            <label class="form-label" for="{{ $g->id }}">{{ $g->gender_desc }}</label>
                        @endforeach
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginPassword">{{__('text.password')}}</label>
                        <input type="password" id="loginPassword" name="password" class="form-control" />
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginName">{{__('text.last_name')}}</label>
                        <input type="text" value="{{ $user->last_name }}" id="loginName" name="lastName"
                            class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="role">{{__('text.role')}}</label>
                        <input type="text" disabled value="{{ $user->role_name }}" id="role" name="lastName"
                            class="form-control" />
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
            <div class="w-100 d-flex justify-content-end">
                <button type="submit" class="btn btn-warning btn-block mb-4">Save</button>
            </div>
        </form>
    </div>
@endsection
