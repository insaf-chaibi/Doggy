@extends('layouts.app')

@section('content')

    <div class="col">

        <div class="container alert">
            @if ($message = Session::get('delete'))
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>

            @endif
        </div>
        <div class="card  ">

            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>

                        <th style="width: 20%" class="text-center">
                            Dog's name
                        </th>
                        <th style="width: 20%" class="text-center">
                            Sender's name
                        </th>
                        <th style="width: 20%" class="text-center">
                            Request's Date
                        </th>
                        <th style="width: 20%" class="text-center">
                            Status

                        </th>
                        <th style="width: 20%" class="text-center">
                            Options

                        </th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($requests as $request)
                        @if($request->status==0)
                            <tr class="bg-danger">
                        @else
                            <tr class="bg-success">
                                @endif


                                <td class="text-center">
                                    {{$request->dog_name}}

                                </td>

                                <td class="text-center">
                                    {{$request->sender_name}}

                                </td>


                                <td class="text-center">
                                    {{$request->created_at}}

                                </td>
                                <td class="project_progress text-center">
                                    @if($request->status==0)
                                        Pending
                                    @else     Accepted
                                    @endif

                                </td>

                                <td class="project-actions text-center">


                                    <div class="project-actions justify-content-center d-flex ">


                                        @if($request->status==0)

                                            <a href="{{route('toggle_status',$request->id) }}}}"
                                               class="btn btn-danger btn-sm m-1 bg-success"> <i class="fas fa-check">
                                                </i>
                                                Accept</a>

                                        @else

                                            <a href="{{route('toggle_status',$request->id) }}}}"
                                               class="btn btn-danger btn-sm m-1 bg-danger"> <i class="fas fa-trash">
                                                </i>
                                                Cancel</a>
                                        @endif
                                    </div>

                                </td>
                            </tr>
                            @endforeach


                    </tbody>
                </table>
                <div class="m-5  d-flex flex-row justify-content-center  ">
                    <div>{{$requests->links()}} </div>

                </div>
                <div class="m-5  d-flex flex-row justify-content-center  ">


                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
