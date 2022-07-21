@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de parking</h3>
                    <a class="btn  btn-primary" href="/back/parking/create">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>Numero de place</th>
                            <th>Prix par jour</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($parking as $parking)
                        <tr>
                          <td></td>
                        <td>{{$parking->idparking}}</td>
                        <td>{{$parking->numeroplace}}</td>
                        <td>{{$parking->prixjour}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('parking.show',$parking->idparking)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('parking.edit',$parking->idparking)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form id="destroy{{$parking->idparking}}" method="POST" action="{{route('parking.destroy',$parking->idparking)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($parking->etat==1)
                                                        <a href="{{route('parking.state',$parking->idparking)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
                                                            @else($parking->etat==0)
                                                            <a href="{{route('parking.state',$parking->idparking)}}" class="btn btn-info  btn-sm ">
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
