@extends('master')
@section('content')
    <div class="container mt-5">
        <h4>{{ $item->item_name }}</h4>
        <div class="row d-flex w-100 ">
            <div class="col-3">
                <img src="{{ $item->item_picture }}" alt="" srcset="" style="width: 100%; height:100%">
            </div>
            <div class="col-9 d-flex align-items-start flex-column py-5">
                <b class="my-2">Price : Rp {{ number_format($item->price, 2, '.', ',') }}</b>
                <p>{{ $item->item_desc }}</p>
            </div>
        </div>
        <div class=" w-100 d-flex justify-content-end">
            <form action="{{ url('addToCart') }}" method="POST">
                @csrf
                <input type="hidden" name="itemId" value="{{$item->id}}">
                <button type="submit" class="btn btn-warning px-5">Buy</button>
            </form>
        </div>
    </div>
@endsection
