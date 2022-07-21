@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de table_restaurant</h3>
                    <a class="btn  btn-primary" href="/back/table_restaurant/create">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>Numetable_restaurant</th>
                            <th>Nbre Personne</th>
                            <th>Image</th>
                            <th>Nombre place</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($table_restaurant as $table_restaurant)
                        <tr>
                          <td></td>
                        <td>{{$table_restaurant->idtable_restaurant}}</td>
                        <td>{{$table_restaurant->numerotable}}</td>
                        <td>{{$table_restaurant->nbrpersonne}}</td>
                        <td><img src="{{asset('uploads/image/'.$table_restaurant->image)}}" width="55px" alt=""></td>
                        <td>{{$table_restaurant->nbrplace}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('table_restaurant.show',$table_restaurant->idtable_restaurant)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('table_restaurant.edit',$table_restaurant->idtable_restaurant)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form idtable_restaurant="destroy{{$table_restaurant->idtable_restaurant}}" method="POST" action="{{route('table_restaurant.destroy',$table_restaurant->idtable_restaurant)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($table_restaurant->etat==1)
                                                        <a href="{{route('table_restaurant.state',$table_restaurant->idtable_restaurant)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
                                                            @else($table_restaurant->etat==0)
                                                            <a href="{{route('table_restaurant.state',$table_restaurant->idtable_restaurant)}}" class="btn btn-info  btn-sm ">
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