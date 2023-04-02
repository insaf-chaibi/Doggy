@extends('layouts.app')

@section('content')

    <div class="col">


        <div class="card  ">

            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>

                        <th style="width: 20%" class="text-center">
                            Name
                        </th>
                        <th style="width: 20%" class="text-center">
                            Email
                        </th>
                        <th style="width: 20%" class="text-center">
                            Creation Date
                        </th>
                        <th style="width: 20%" class="text-center">
                            Phone

                        </th>

                    </tr>
                    </thead>
                    <tbody>


                    @foreach($users as $user)

                            <tr>



                                <td class="text-center">
                                    {{$user->name}}

                                </td>

                                <td class="text-center">
                                    {{$user->email}}

                                </td>


                                <td class="text-center">
                                    {{$user->created_at}}

                                </td>
                                <td class="project_progress text-center">
                                    {{$user->phone}}


                                </td>


                            </tr>
                            @endforeach


                    </tbody>
                </table>
                <div class="m-5  d-flex flex-row justify-content-center  ">
                    <div>{{$users->links()}} </div>

                </div>
                <div class="m-5  d-flex flex-row justify-content-center  ">


                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
