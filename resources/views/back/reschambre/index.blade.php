@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de reservation de chambre</h3>
                    <a class="btn  btn-primary" href="{{route('reschambre.create2')}}">Ajouter</a>
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
                            <th>date reservation</th>
                            <th>Chambre réservée</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($reschambre as $reschambre)
                        <tr>
                          <td></td>
                        <td>{{$reschambre->idreschambre}}</td>
                        <td>{{$reschambre->nomClient}}</td>
                        <td>{{$reschambre->prenomClient}}</td>
                        <td>{{$reschambre->numPieceID}}</td>
                        <td>{{$reschambre->nbre_personne}}</td>
                        <td>{{$reschambre->date}}</td>
                        <td>{{$reschambre->numeroChambre}}</td>
                            <td>
                          <div class="d-flex">
                                          <a href="{{route('reschambre.show',$reschambre->idreschambre)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('reschambre.edit',$reschambre->idreschambre)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form id="destroy{{$reschambre->idreschambre}}" method="POST" action="{{route('reschambre.destroy',$reschambre->idreschambre)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>

                              @if($reschambre->etat==1)
                                  <a href="{{route('reschambre.state',$reschambre->idreschambre)}}" class="btn btn-success  btn-sm ">
                                      <i class="fa fa-thumbs-up"></i></a>
                              @else($reschambre->etat==0)
                                  <a href="{{route('reschambre.state',$reschambre->idreschambre)}}" class="btn btn-info  btn-sm ">
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
