@extends('back.index')
@section('contenu')

<div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste de reservation du restaurant</h3>
                    <a class="btn  btn-primary" href="/back/reservation/create">Ajoute</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-primary">
                      <thead class="bg-primary text-white">
                        <tr>
                        <th></th>
                            <th>id</th>
                            <th>Type de reservation</th>
                            <th>Date de reservation</th>
                            
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($reservation as $reservation)
                        <tr>
                          <td></td>
                        <td>{{$reservation->idresrestaurant}}</td>
                        <td>{{$reservation->typeReservation}}</td>
                        <td>{{$reservation->created_at}}</td>
                                                  <td>
                          <div class="d-flex">
                                          <a href="{{route('reservation.show',$reservation->idresrestaurant)}}" class="btn btn-warning  btn-sm ">
                                                        <i class="fa fa-eye"></i></a>
                            <a href="{{route('reservation.edit',$reservation->idresrestaurant)}}" class="btn btn-primary  btn-sm ">
                                                            <i class="fa fa-edit"></i></a>
                                                    <form id="destroy{{$reservation->idresrestaurant}}" method="POST" action="{{route('reservation.destroy',$reservation->idresrestaurant)}}">
                                                        @csrf
                                                        @method('DELETE')
                                        <a href="" class="btn btn-danger btn-sm" title="supprimer" onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="fa fa-trash"></i></a>
                                                        </form>
                                                            @if($reservation->etat==1)
                                                        <a href="{{route('reservation.state',$reservation->idresrestaurant)}}" class="btn btn-info  btn-sm ">
                                                            <i class="fa fa-thumbs-down"></i></a>
                                                            @else($reservation->etat==0)
                                                            <a href="{{route('reservation.state',$reservation->idresrestaurant)}}" class="btn btn-success  btn-sm ">
                                                            <i class="fa fa-thumbs-up"></i></a>
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