@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Formulaire pour voir</h4>
                                <a class="btn  btn-primary" href="{{route('client.index')}}">lister</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session()->has('message'))
                                    <div class="alert alert-icon alert-success" >
                                    <em  class="icon li li-alert-circle"></em>
                                    {
                                    
                                    {La client a ete bein modifier}
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
                                    @foreach($clients as $client)
                                    <form action="" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="idclient" value="{{$client->idclient}}">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nom</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nomClient"placeholder="" value="{{$client->nomClient}}" disabled="disabled">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Prenom</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="prenomClient" placeholder="" value="{{$client->prenomClient}}" disabled="disabled">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telephone</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="telClient"class="form-control" placeholder="" value="{{$client->telClient}}" disabled="disabled">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="emailClient"class="form-control" placeholder="" value="{{$client->emailClient}}" disabled="disabled">
                                            </div>
                                            </div>
                                           <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Adresse</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="" name="adresseClient" value="{{$client->adresseClient}}" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Numero pieceID</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="" name="adresseClient" value="{{$client->numPieceID}}" disabled="disabled">
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                      <div class="form-group has-feedback">
                                          <img src="{{asset('uploads/image/'.$client->image)}}" width="100px" alt="" disabled="disabled">
                                          
                                      </div>
                                    </div>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

@endsection