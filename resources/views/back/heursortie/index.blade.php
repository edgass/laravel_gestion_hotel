@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de heursortie</h3>
                    <a class="btn  btn-primary" href="/back/heursortie/create">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>MatriculEmp</th>
                            <th>NomEmp</th>
                            <th>Heur d'sortie</th>
                            <th>Date du jour</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($heursortie as $heursortie)
                        <tr>
                          <td></td>
                        <td>{{$heursortie->idheursortie}}</td>
                        <td>{{$heursortie->matEmp}}</td>
                        <td>{{$heursortie->nomEmp}}</td>
                        <td>{{$heursortie->heursortie}}</td>
                        <td>{{$heursortie->created_at}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('heursortie.show',$heursortie->idheursortie)}}" class="btn btn-warning  btn-sm ">
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