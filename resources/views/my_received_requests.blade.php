@extends('layouts.app')

@section('content')
    <div class="card  ">

        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>

                    <th style="width: 25%"class="text-center">
                        Nom et Prénom de client
                    </th>
                    <th style="width: 25%"class="text-center">
                        Nationalité
                    </th>
                    <th style="width: 25%"class="text-center">
                        Immatricule

                    </th>
                    <th style="width: 25%" class="text-center">
                        Options

                    </th>
                </tr>
                </thead>
                <tbody>


                <tr>




                    <td class="text-center">


                    </td>




                    <td class="text-center">


                    </td>
                    <td class="project_progress text-center" >


                    </td>

                    <td class="project-actions text-center">


                        <div class="project-actions justify-content-center d-flex ">



                            {{--
                                                            @if($car->granted==0)
                                                                <a href="" class="btn bg-danger bg-opacity-75"><i class="fa fa-triangle-exclamation"></i> ajouter un garantie</a>

                                                            @else
                                                                <button class="btn btn-success"><i class="fa fa-check"></i></button>
                                                            @endif--}}

                            <form action=""method="POST">
                            @method('DELETE')
                            @csrf
                            <!-- pour des raison de securité -->
                                <button type="submit" class="btn btn-danger btn-sm m-1">
                                    <i class="fas fa-trash">
                                    </i>
                                    Supprimer
                                </button>
                            </form>
                        </div>

                    </td>
                </tr>





                </tbody>
            </table>
            <div class="m-5  d-flex flex-row justify-content-center  ">
                        <div>{{$cars->links()}} </div>

            </div>
            <div class="m-5  d-flex flex-row justify-content-center  ">


            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
