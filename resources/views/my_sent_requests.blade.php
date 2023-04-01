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

                     <th style="width: 25%" class="text-center">
                         Dog's name
                     </th>
                     <th style="width: 25%" class="text-center">
                         Request's Date
                     </th>
                     <th style="width: 25%" class="text-center">
                         Status

                     </th>
                     <th style="width: 25%" class="text-center">
                         Options

                     </th>
                 </tr>
                 </thead>
                 <tbody>


                 @foreach($requests as $request)
                     @if($request->status==0)
                         <tr class="bg-danger">
                     @else
                         <tr  class="bg-success">
                             @endif


                             <td class="text-center">
                                 {{$request->name}}

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


                                     {{--
                                                                     @if($car->granted==0)
                                                                         <a href="" class="btn bg-danger bg-opacity-75"><i class="fa fa-triangle-exclamation"></i> ajouter un garantie</a>

                                                                     @else
                                                                         <button class="btn btn-success"><i class="fa fa-check"></i></button>
                                                                     @endif--}}

                                     @if($request->status==0)
                                         <form action="{{ route('delete_request',$request->id) }}"method="POST">
                                             @method('DELETE')
                                             @csrf
                                             <button type="submit" class="btn btn-danger btn-sm m-1 bg-primary">
                                                 <i class="fas fa-trash">
                                                 </i>
                                                 Delete
                                             </button>
                                         </form>
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
