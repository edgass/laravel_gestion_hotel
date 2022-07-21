@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Full color variations</h3>
                    <a class="btn  btn-primary" href="/back/recruitement/create">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Image</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>PaysResidance</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($recruitement as $recruitement)
                        <tr>
                          <td></td>
                        <td>{{$recruitement->idrecruitement}}</td>
                        <td>{{$recruitement->nomCand}}</td>
                        <td>{{$recruitement->prenomCand}}</td>
                        <td><img src="{{asset('uploads/image/'.$recruitement->image)}}" width="55px" alt=""></td>
                        <td>{{$recruitement->telCand}}</td>
                        <td>{{$recruitement->emailCand}}</td>
                        <td>{{$recruitement->adresseCand}}</td>
                        <td>{{$recruitement->paysResidance}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('recruitement.show',$recruitement->idrecruitement)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('recruitement.edit',$recruitement->idrecruitement)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form id="destroy{{$recruitement->idrecruitement}}" method="POST" action="{{route('recruitement.destroy',$recruitement->idrecruitement)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($recruitement->etat==1)
                                                        <a href="{{route('recruitement.state',$recruitement->idrecruitement)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
                                                            @else($recruitement->etat==0)
                                                            <a href="{{route('recruitement.state',$recruitement->idrecruitement)}}" class="btn btn-info  btn-sm ">
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