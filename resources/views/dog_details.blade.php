@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container alert">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{$message}}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">Details</div>

                    <div class="card-body">
                        <img src="{{$dog->image}}" class="img-fluid" style="height: 30%; width:30% ; margin:10px">
                        <div class="container">
                            <div class="col">



                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-2">
                                        Name
                                    </div>
                                    <div class="col-6">
                                        {{$dog->name}}
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Age
                                    </div>
                                    <div class="col-6">
                                        {{$dog->age}} ans

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Weight
                                    </div>
                                    <div class="col-6">
                                        {{$dog->weight}} Kg

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Breed
                                    </div>
                                    <div class="col-6">
                                        {{$dog->breed}}

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Gender
                                    </div>
                                    <div class="col-6">
                                        {{$dog->gender}}

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        vaccinated
                                    </div>
                                    <div class="col-6">
                                        {{$dog->vaccinated}}

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Description
                                    </div>
                                    <div class="col-6">
                                        {{$dog->description}}

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Owner
                                    </div>
                                    <div class="col-6">
                                        {{$dog->user->name}}

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Owner's email
                                    </div>
                                    <div class="col-6">
                                        {{$dog->user->email}}

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Owner's phone
                                    </div>
                                    <div class="col-6">
                                        {{$dog->user->phone}}

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

