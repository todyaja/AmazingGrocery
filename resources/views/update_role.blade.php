@extends('master')
@section('content')
    <div class="container py-5">
        <h3><u>{{ $user->first_name . ' ' . $user->last_name }}</u></h3>
        <form action="{{ url('postUpdateRole') }}" method="post">
            @csrf
            <input type="hidden" name="userId" value="{{$user->id}}">
            <div class="form-outline mb-4">
                <label class="form-label" for="role">Role</label>
                <select class="form-select" name="role" id="role">
                    @foreach ($role as $r)
                        <option {{$r->id == $user->role_id ? 'selected' : ''}} value="{{ $r->id }}">{{ $r->role_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>

    </div>
@endsection
