@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de reservation de parking</h3>
                    <a class="btn  btn-primary" href="{{route('resparking.create2')}}">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>Nom</th>
                            <th>numPieceID</th>
                            <th>numero place</th>
                            <th>date reservation</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($resparkings as $resparking)
                        <tr>
                          <td></td>
                        <td>{{$resparking->idresparking}}</td>
                        <td>{{$resparking->nomClient}}</td>
                        <td>{{$resparking->numPieceID}}</td>
                        <td>{{$resparking->numeroplace}}</td>
                        <td>{{$resparking->date}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('resparking.show',$resparking->idresparking)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('resparking.edit',$resparking->idresparking)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form id="destroy{{$resparking->idresparking}}" method="POST" action="{{route('resparking.destroy',$resparking->idresparking)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($resparking->etat==1)
                                                        <a href="{{route('resparking.state',$resparking->idresparking)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
                                                            @else($resparking->etat==0)
                                                            <a href="{{route('resparking.state',$resparking->idresparking)}}" class="btn btn-info  btn-sm ">
                                                            <i class="fa fa-thumbs-down"></i></a>
                                                            @endif
                          </div>
                        </td>
                        </tr>

                         @endforeach

                      </tbody>
                    </table>
                  </div>
                  <!-- table-responsive -->
                </div>
              </div>
              @endsection
