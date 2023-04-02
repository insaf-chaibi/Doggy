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
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <div class="profile-photo">
                            <img src="{{ asset('images/photo-profile.jpg') }}">
                        </div>
                        <div class="container">
                         <div class="col">
                             <div class="row">
                                 <div class="col-md-2">
                                     Email
                                 </div>
                                 <div class="col-6">
                                     {{$owner->email}}
                                 </div>

                             </div>
                             <div class="row">
                                 <div class="col-md-2">
                                     Full name
                                 </div>
                                 <div class="col-6">
                                     {{$owner->name}}
                                 </div>

                             </div>
                             <div class="row">
                                 <div class="col-md-2">
                                     Phone
                                 </div>
                                 <div class="col-6">
                                     {{$owner->phone}}
                                 </div>

                             </div>
                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
