@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Formulaire de Modiffication</h4>
                                <a class="btn  btn-primary" href="{{route('client.index')}}">lister</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                     @if(session()->has('message'))
                                    <div class="alert alert-icon alert-success">
                                        <em class="icon ni ni-alert-circle"></em>
                                            {{session('message')}}
                                        </div>
                                        @endif
                                        @if($errors->any())
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-icon alert-danger">
                                        <em class="icon ni ni-alert-circle"></em>
                                        {{$error}}
                                        </div>
                                        @endforeach
                                        @endif
                                    @foreach($client as $client)
                                    <form action="{{route('client.update', $client->idclient)}}" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nom</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nomClient"placeholder="" value="{{$client->nomClient}}">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Prenom</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="prenomClient" placeholder="" value="{{$client->prenomClient}}">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telephone</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="telClient"class="form-control" placeholder="" value="{{$client->telClient}}">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="emailClient"class="form-control" placeholder="" value="{{$client->emailClient}}">
                                            </div>
                                            </div>
                                           <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Adresse</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="" name="adresseClient" value="{{$client->adresseClient}}">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                          <div class="form-group has-feedback">
                                            <label class="control-label">Numero piece ID</label>
                                            <input class="form-control" placeholder="Company" type="text" name="numPieceID" value="{{$client->numPieceID}}">
                                            <span class="fa fa-briefcase form-control-feedback" aria-hidden="true"></span> </div>
                                        </div>
                                     <div class="col-md-12">
                                      <div class="form-group has-feedback">
                                        <label class="custom-file center-block block">
                                          <input id="file" class="custom-file-input" type="file" name="image" value="{{$client->image}}">
                                          <span class="custom-file-control"></span> </label>
                                      </div>
                                    </div>
                                         
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Enregistre</button>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

@endsection