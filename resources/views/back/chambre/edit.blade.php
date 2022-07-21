@extends('back.index')
@section('contenu')
<div class="col-lg-12">
          <div class="card ">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">FORMULAIRE D'ENREGISTREMENT</h5>
              <button type="submit"  > <a href="{{route('chambre.index')}}"class="btn btn-primary">Lister </a> </button>
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
              @foreach($chambre as $chambre)
             <form action="{{route('chambre.update', $chambre->idchambre)}}" method="post" enctype="multipart/form-data">
                 @csrf
                 @method('put')
            <input type="hidden"  name="id" value="{{$chambre->idchambre}}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Numero de chambre</label>
                    <input class="form-control" placeholder="" name="numeroChambre" type="text" value="{{$chambre->numeroChambre}}">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Taille de la chambre</label>
                    <input class="form-control" placeholder="" type="text" name="tailleChambre" value="{{$chambre->tailleChambre}}">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Prix du chambre</label>
                    <input class="form-control" placeholder="" type="text" name="prixChambre" value="{{$chambre->prixChambre}}">
                    <span class="fa fa-envelope-o form-control-feedback" aria-hidden="true"></span> 
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Nombre de personne</label>
                    <input class="form-control" placeholder="" type="text" name="nombre_personne" value="{{$chambre->nombre_personne}}">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="custom-file center-block block">
                      <input id="file" class="custom-file-input" type="file" name="image" value="{{$chambre->image}}">
                      <span class="custom-file-control"></span> </label>
                  </div>
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