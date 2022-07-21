@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de reservation de piscine</h3>
                    <a class="btn  btn-primary" href="{{route('respiscine.create2')}}">Ajouter</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>Nom</th>
                            <th>numPieceID</th>
                            <th>nbre_personne</th>
                            <th>date reservation</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($respiscines as $respiscine)
                        <tr>
                          <td></td>
                        <td>{{$respiscine->idrespiscine}}</td>
                        <td>{{$respiscine->nomClient}}</td>
                        <td>{{$respiscine->numPieceID}}</td>
                        <td>{{$respiscine->nbre_personne}}</td>
                        <td>{{$respiscine->date}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('respiscine.show',$respiscine->idrespiscine)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('respiscine.edit',$respiscine->idrespiscine)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form id="destroy{{$respiscine->idrespiscine}}" method="POST" action="{{route('respiscine.destroy',$respiscine->idrespiscine)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($respiscine->etat==1)
                                                        <a href="{{route('respiscine.state',$respiscine->idrespiscine)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
                                                            @else($respiscine->etat==0)
                                                            <a href="{{route('respiscine.state',$respiscine->idrespiscine)}}" class="btn btn-info  btn-sm ">
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
