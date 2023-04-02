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
                            Age
                        </th>
                        <th style="width: 20%" class="text-center">
                            Creation Date
                        </th>
                        <th style="width: 20%" class="text-center">
                            Vaccinated

                        </th>

                    </tr>
                    </thead>
                    <tbody>


                    @foreach($dogs as $dog)

                        <tr>



                            <td class="text-center">
                                {{$dog->name}}

                            </td>

                            <td class="text-center">
                                {{$dog->age}}

                            </td>


                            <td class="text-center">
                                {{$dog->created_at}}

                            </td>
                            <td class="project_progress text-center">
                                {{$dog->vaccinated}}


                            </td>


                        </tr>
                    @endforeach


                    </tbody>
                </table>
                <div class="m-5  d-flex flex-row justify-content-center  ">
                    <div>{{$dogs->links()}} </div>

                </div>
                <div class="m-5  d-flex flex-row justify-content-center  ">


                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
