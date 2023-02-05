@extends('master')
@section('content')
    @auth
        <div class="d-flex row flex-wrap mt-5 justify-content-start">
            @foreach ($items as $i)
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 my-2">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $i->item_picture }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-secondary">{{ $i->item_name }}</h5>
                            <a href="{{ url('item/' . $i->id) }}" class="btn btn-primary">{{__('text.detail')}}</a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="p-5 d-flex w-100 justify-content-center align-items-center"> {{ $items->links() }}</div>
    @else
        <div class="h-100 w-100 d-flex align-items-center justify-content-center">
            <div class="border border-5 rounded-circle p-5 border-warning d-flex align-items-center justify-content-center"
                style="border-radius: 50%; width: fit-content; height: 800px">
                <h1>{{__('text.catchphrase')}}</h1>
            </div>
        </div>
    @endauth
@endsection
