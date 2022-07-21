@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Formulaire du Client</h3>
                    <a class="btn  btn-primary" href="{{route('client.create')}}">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>NumeroPieceID</th>
                            <th>Image</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($client as $client)
                        <tr>
                          <td></td>
                        <td>{{$client->idclient}}</td>
                        <td>{{$client->nomClient}}</td>
                        <td>{{$client->prenomClient}}</td>
                        <td>{{$client->numPieceID}}</td>
                        <td><img src="{{asset('uploads/image/'.$client->image)}}" width="55px" alt=""></td>
                        <td>{{$client->telClient}}</td>
                        <td>{{$client->emailClient}}</td>
                        <td>{{$client->adresseClient}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('client.show',$client->idclient)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>


                                                    <form id="destroy{{$client->idclient}}" method="POST" action="{{route('client.destroy',$client->idclient)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($client->etat==1)
                                                        <a href="{{route('client.state',$client->idclient)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
                                                            @else($client->etat==0)
                                                            <a href="{{route('client.state',$client->idclient)}}" class="btn btn-info  btn-sm ">
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
