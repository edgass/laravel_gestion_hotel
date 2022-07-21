@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de Chambre</h3>
                    <a class="btn  btn-primary" href="/back/chambre/create">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>idchambre</th>
                            <th>NumeChambre</th>
                            <th>Taille</th>
                            <th>Nbre Personne</th>
                            <th>Prix</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($chambre as $chambre)
                        <tr>
                          <td></td>
                        <td>{{$chambre->idchambre}}</td>
                        <td>{{$chambre->numeroChambre}}</td>
                        <td>{{$chambre->tailleChambre}}</td>
                        <td>{{$chambre->nombre_personne}}</td>
                        <td>{{$chambre->prixChambre}}</td>
                       <td><img src="{{asset('uploads/image/'.$chambre->image)}}" width="60px" alt=""></td>
                                                  <td>
                          <div class="d-flex">
                            <a href="{{route('chambre.show',$chambre->idchambre)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('chambre.edit',$chambre->idchambre)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form idchambre="destroy{{$chambre->idchambre}}" method="POST" action="{{route('chambre.destroy',$chambre->idchambre)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($chambre->etat==1)
                                                        <a href="{{route('chambre.state',$chambre->idchambre)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
                                                            @else($chambre->etat==0)
                                                            <a href="{{route('chambre.state',$chambre->idchambre)}}" class="btn btn-info  btn-sm ">
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