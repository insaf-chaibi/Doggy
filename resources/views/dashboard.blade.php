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
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Users</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $users_count }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Dogs for adoption</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dogs_count }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">Adopted dogs</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $adpoted_count }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Danger card title</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Warning card title</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Info card title</h5>
                                </div>
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