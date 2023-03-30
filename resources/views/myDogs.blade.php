@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="container alert">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
            @endif
        </div>
        @foreach ($dogs as $item)
            <div class="col-md-3">
                <div class="dog-container">
                    <img src="{{ $item->image }}" class="img-fluid" style="height: 160px " >
                    <h4 style="font-weight:bold">{{ $item->name}}</h4>
                    <p>Age : {{ $item->age }}  year(s)</p>
                    <p>Weight : {{ $item->weight }} Kg</p>
                    <p>Breed : {{ $item->breed }}</p>
                    <p>Gender : {{ $item->gender }}</p>
                    <p>Vaccinated : {{ $item->vaccinated }}</p>

                    <div class="d-flex">
                        <form action="{{ route('dogs.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                        <form action="{{ route('dogs.edit',$item->id)}}" method="GET">
                            @csrf
                            <button class="btn" type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {!! $dogs->links() !!}

</div>
@endsection