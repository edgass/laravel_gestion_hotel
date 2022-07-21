@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vertical Form</h4>
                                <a class="btn  btn-primary" href="{{route('reservation.index')}}">lister</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session()->has('message'))
                                    <div class="alert alert-icon alert-success" >
                                    <em  class="icon li li-alert-circle"></em>
                                    {
                                    
                                    {La reservation a ete bein modifier}
                                        }
                                    </div>
                                    @endif
                                    
                                    @if($errors->any())
                                    @foreach($errors->all() as $error))
                                    <div class="alert alert-icon alert-danger" >
                                    <em  class="icon li  li-alert-circle"></em>
                                        {
                                            {$error}
                                        }
                                    </div>
                                    @endforeach
                                    @endif
                                    <form action="{{route('reservation.update', $reservation->idresrestaurant)}}" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="idresrestaurant" value="{{$reservation->idresrestaurant}}">
                                        <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Type de reservation</label>
                    <select name="typeReservation" class="form-control" type="text" value="{{$reservation->typeReservation}}">
                                                 <option  selected="" disabled=""></option>
                                                 <option >Restaurant</option>
                                                 <option >Parking</option>
                                                 <option >Chambre</option>
                                                 <option >Table du restaurant</option>
                                                 <option >picine</option>
                                 </select> 
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Date de reservation</label>
                    <input class="form-control" placeholder="" name="dateReservation" type="date" value="{{$reservation->dateReservation}}">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>          
                                    <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection