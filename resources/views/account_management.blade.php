@extends('master')
@section('content')
    <div class="container my-5 py-5">
        <div class="d-flex row">
        <div class="col-9 d-flex justify-content-center">
                <h3><u>Account</u></h3>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <h3><u>Action</u></h3>
            </div>
        </div>
        @foreach ($users as $u)
        <div class="d-flex row border justify-content-center py-2 align-items-center">
            <div class="col-9 d-flex justify-content-center">
                <h5>{{$u->first_name." ".$u->last_name. " - "  . $u->role_name}}</h5>
            </div>
            <div class="col-3 d-flex justify-content-evenly">
                <a href="{{"updateRole/".$u->id}}"><button class="btn btn-warning">Change Role</button></a>
                <form action="{{url('deleteUser/'.$u->id)}}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @endforeach

    </div>
@endsection
