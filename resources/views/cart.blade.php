@extends('master')
@section('content')
    <div class="container py-5">
        <h3><u>{{__('text.cart')}}</u></h3>
        @foreach ($cart as $c)
            <div class="d-flex row justify-content-between align-items-center my-1">
                <div class="col-3">
                    <img src="{{ $c->item_picture }}" alt="" srcset="" style="width: 250px; height 250px">
                </div>
                <div class="col-3">
                    <h5>{{ $c->item_name }}</h5>
                </div>
                <div class="col-3">
                    <h5>Rp {{ number_format($c->price, 2, '.', ',') }} </h5>
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <form action="{{ url('deleteCart/' . $c->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">{{__('text.delete')}}</button>
                    </form>
                </div>
            </div>
        @endforeach
        <form action="{{ url('checkOut') }}" method="POST">
            <div class="d-flex justify-content-end w-100">
                @csrf
                <h4>Total : Rp {{ number_format($totalPrice, 2, '.', ',') }} </h4><button type="submit" class="mx-3 btn btn-warning">Check
                    Out</button>
            </div>
        </form>
    </div>
@endsection
