@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de piscine</h3>
                    <a class="btn  btn-primary" href="/back/piscine/create">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>prix</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($piscine as $piscine)
                        <tr>
                          <td></td>
                        <td>{{$piscine->idpiscine}}</td>
                        <td>{{$piscine->prixPiscine}}</td>

                       <td><img src="{{asset('uploads/image/'.$piscine->image)}}" width="60px" alt=""></td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('piscine.show',$piscine->idpiscine)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('piscine.edit',$piscine->idpiscine)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form id="destroy{{$piscine->idpiscine}}" method="POST" action="{{route('piscine.destroy',$piscine->idpiscine)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($piscine->etat==1)
                                                        <a href="{{route('piscine.state',$piscine->idpiscine)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
                                                            @else($piscine->etat==0)
                                                            <a href="{{route('piscine.state',$piscine->idpiscine)}}" class="btn btn-info  btn-sm ">
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
