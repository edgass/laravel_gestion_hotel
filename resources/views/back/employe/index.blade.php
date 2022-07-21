@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">LISTE DES EMPLOYES</h3>
                    <a class="btn  btn-primary" href="/back/employe/create">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Matricule Emp</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Fonction</th>
                            <th>Salaire</th>
                            <th>dateEnregistrement</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($employe as $employe)
                        <tr>
                          <td></td>
                        <td>{{$employe->idemploye}}</td>
                        <td>{{$employe->nomEmp}}</td>
                        <td>{{$employe->prenomEmp}}</td>
                        <td>{{$employe->matEmp}}</td>
                        <td>{{$employe->telEmp}}</td>
                        <td>{{$employe->emailEmp}}</td>
                        <td>{{$employe->adresseEmp}}</td>
                        <td>{{$employe->fonctionEmp}}</td>
                        <td>{{$employe->salaireEmp}}</td>
                        <td>{{$employe->created_at}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('employe.show',$employe->idemploye)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('employe.edit',$employe->idemploye)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form id="destroy{{$employe->idemploye}}" method="POST" action="{{route('employe.destroy',$employe->idemploye)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($employe->etat==1)
                                                        <a href="{{route('employe.state',$employe->idemploye)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
                                                            @else($employe->etat==0)
                                                            <a href="{{route('employe.state',$employe->idemploye)}}" class="btn btn-info  btn-sm ">
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