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
                                    <form action="" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="idresrestaurant" value="{{$reservation->idresrestaurant}}">
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Date de reservation</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="dateReservation" placeholder="" value="{{$reservation->dateReservation}}" disabled="disabled">
                                            </div>
                                            </div>
                                            
                                    </div>
                                          <div class="form-group has-feedback">
                                          <label class="control-label">Type de reservation</label>
                                          <select name="typeReservation" class="form-control" type="text" value="{{$reservation->typeReservation}}" disabled="disabled">
                                                                            <option >Restaurant</option>
                                                                            <option >Parking</option>
                                                                            <option >Chambre</option>
                                                                            <option >Table du restaurant</option>
                                                                            <option >picine</option>
                                                                        </select> 
                </div>
                </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection