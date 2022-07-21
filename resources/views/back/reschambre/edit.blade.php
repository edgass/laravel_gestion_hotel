@extends('back.index')
@section('contenu')
<div class="col-lg-12">
          <div class="card ">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">FORMULAIRE D'ENREGISTREMENT</h5>
              <button type="submit"  > <a href="{{route('reschambre.index')}}"class="btn btn-primary">Lister </a> </button>
            </div>
            <div class="card-body">
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
              @foreach($reschambre as $reschambre)
             <form action="{{route('reschambre.update', $reschambre->idreschambre)}}" method="post" enctype="multipart/form-data">
                 @csrf
                 @method('put')
            <input type="hidden"  name="id" value="{{$reschambre->idreschambre}}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Nom</label>
                    <input class="form-control" placeholder="" type="text" name="nomclient" value="{{$reschambre->nomclient}}">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Prenom</label>
                    <input class="form-control" placeholder="" name="prenomclient" type="text" value="{{$reschambre->prenomclient}}">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">NumPieceID</label>
                    <input class="form-control" placeholder="" type="text" name="numPieceID" value="{{$reschambre->numPieceID}}">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Nombre_personne</label>
                    <input class="form-control" placeholder="" type="text" name="nbre_personne" value="{{$reschambre->nbre_personne}}">
                    <span class="fa fa-envelope-o form-control-feedback" aria-hidden="true"></span> 
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Date reservation</label>
                    <input class="form-control" placeholder="" type="date" name="date" value="{{$reschambre->date}}">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-success">Envoyer</button>
                </div>
                 </div>
              </form>
           @endforeach
            </div>
          </div>
        </div>
        @endsection