@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de reservation du restaurant</h3>
                    <a class="btn  btn-primary" href="{{route('resrestaurant.create2')}}">Ajouter</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>numPieceID</th>
                            <th>nbre_personne</th>
                            <th>Table réservée</th>
                            <th>date reservation</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($resrestaurants as $resrestaurant)
                        <tr>
                          <td></td>
                        <td>{{$resrestaurant->idresrestaurant}}</td>
                        <td>{{$resrestaurant->nomClient}}</td>
                        <td>{{$resrestaurant->prenomClient}}</td>
                        <td>{{$resrestaurant->numPieceID}}</td>
                        <td>{{$resrestaurant->nbre_personne}}</td>
                            <td>{{$resrestaurant->numerotable}}</td>
                        <td>{{$resrestaurant->date}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('resrestaurant.show',$resrestaurant->idresrestaurant)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('resrestaurant.edit',$resrestaurant->idresrestaurant)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form id="destroy{{$resrestaurant->idresrestaurant}}" method="POST" action="{{route('resrestaurant.destroy',$resrestaurant->idresrestaurant)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($resrestaurant->etat==1)
                                                        <a href="{{route('resrestaurant.state',$resrestaurant->idresrestaurant)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
                                                            @else($resrestaurant->etat==0)
                                                            <a href="{{route('resrestaurant.state',$resrestaurant->idresrestaurant)}}" class="btn btn-info  btn-sm ">
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
