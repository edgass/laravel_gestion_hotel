@extends('back.index')
@section('contenu')
<div class="col-lg-12">
          <div class="card ">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">FORMULAIRE D'ENREGISTREMENT</h5>
              <button type="submit"  > <a href="{{route('respiscine.index')}}"class="btn btn-primary">Lister </a> </button>
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

             <form action="{{route('respiscine.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                 @method('POST')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                      <label class="control-label">NumPieceID</label>
                      <select class="custom-select form-control" name="numPieceID">
                          @foreach($numPieceIDs as $numPieceID)
                              <option value="{{$numPieceID->numPieceID}}">{{$numPieceID->numPieceID}}</option>
                          @endforeach
                      </select>
                  </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Nombre_personne</label>
                    <input class="form-control" placeholder="" type="text" name="nbre_personne">
                    <span class="fa fa-envelope-o form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Date reservation</label>
                    <input class="form-control" placeholder="" type="date" name="date">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                  <div class="form-group has-feedback">
                      <label class="control-label">Piscine à réserver</label>
                      <select class="custom-select form-control" name="idpiscine">
                          @foreach($piscines as $piscine)
                              <option value="{{$piscine->idpiscine}}">{{$piscine->idpiscine}}-{{$piscine->prixPiscine}}</option>
                          @endforeach
                      </select>
                  </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-success">Envoyer</button>
                </div>
                 </div>
              </form>

            </div>
          </div>
        </div>
        @endsection
