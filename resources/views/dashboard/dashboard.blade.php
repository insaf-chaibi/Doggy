@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="container alert">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{$message}}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <a href="{{route('users')}}" class="href">

                                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Users</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$users->count() }}</h5>
                                            </div>
                                        </div>

                                    </a>
                                </div>

                                <div class="col-sm">
                                    <a href="{{route('dogs')}}" class="href">
                                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Dogs</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $dogs->count() }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>



                                <div class="col-sm">
                                    <a href="{{route('adoption_requests')}}" class="href">
                                        <div class="card text-white text-bg-success mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Adoption Requests</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $adoptionRequests->count() }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
