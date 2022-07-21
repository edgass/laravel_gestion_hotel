@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de heurentre</h3>
                    <a class="btn  btn-primary" href="/back/heurentre/create">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>MatriculEmp</th>
                            <th>NomEmp</th>
                            <th>Heur d'entre</th>
                            <th>Date du jour</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($heurentre as $heurentre)
                        <tr>
                          <td></td>
                        <td>{{$heurentre->idheurentre}}</td>
                        <td>{{$heurentre->matEmp}}</td>
                        <td>{{$heurentre->nomEmp}}</td>
                        <td>{{$heurentre->heurentre}}</td>
                        <td>{{$heurentre->created_at}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('heurentre.show',$heurentre->idheurentre)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                       
                                                   
                                                         
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