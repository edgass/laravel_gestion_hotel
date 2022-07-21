@extends('back.index')
@section('contenu')
<div class="col-lg-12">
          <div class="card ">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">FORMULAIRE D'ENREGISTREMENT DE parking</h5>
              <button type="submit"  > <a href="{{route('parking.index')}}"class="btn btn-primary">Lister </a> </button>
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

             <form action="{{route('parking.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Numero_parking</label>
                    <input class="form-control" placeholder="" name="numeroplace" type="text">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                  <div class="col-md-6">
                      <div class="form-group has-feedback">
                          <label class="control-label">Prix de la place</label>
                          <input class="form-control" placeholder="" name="prixjour" type="text">
                          <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                  </div>
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
