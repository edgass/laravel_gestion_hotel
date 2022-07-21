@extends('back.index')
@section('contenu')
<div class="col-lg-12">
          <div class="card ">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">FORMULAIRE D'ENREGISTREMENT DE heursortie</h5>
              <button type="submit"  > <a href="{{route('heursortie.index')}}"class="btn btn-primary">Lister </a> </button>
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
              
             <form action="{{route('heursortie.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Matricule Employe</label>
                    <input class="form-control" placeholder="" name="matEmp" type="text">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Nom d employe</label>
                    <input class="form-control" placeholder="" type="text" name="nomEmp">
                    <span class="fa fa-envelope-o form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Heur de sortie</label>
                    <input class="form-control" placeholder="" type="text" name="heursortie">
                    <span class="fa fa-phone form-control-feedback" aria-hidden="true"></span> </div>
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