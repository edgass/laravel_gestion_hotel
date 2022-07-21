@extends('back.index')
@section('contenu')
<div class="col-lg-12">
          <div class="card ">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">FORMULAIRE D'ENREGISTREMENT</h5>
              <button type="submit"  > <a href="{{route('recruitement.index')}}"class="btn btn-primary">Lister </a> </button>
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
              
             <form action="{{route('recruitement.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Nom</label>
                    <input class="form-control" placeholder="Nom" type="text" name="nomCand">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Prenom</label>
                    <input class="form-control" placeholder="" name="prenomCand" type="text">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">E-mail</label>
                    <input class="form-control" placeholder="E-mail" type="text" name="emailCand">
                    <span class="fa fa-envelope-o form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Telephone</label>
                    <input class="form-control" placeholder="Contact Number" type="text" name="telCand">
                    <span class="fa fa-phone form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Adresse</label>
                    <input class="form-control" placeholder="Company" type="text" name="adresseCand">
                    <span class="fa fa-briefcase form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Pays Residance</label>
                     <select name="paysResidance" class="form-control" type="text">
                                                                        <option  selected="" disabled=""></option>
                                                                            <option >Comore</option>
                                                                            <option >Gunie</option>
                                                                            <option >Senegal</option>
                                                                            <option >Mali</option>
                                                                            <option >Togo</option>
                                                                        </select> 
                </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="custom-file center-block block">
                      <input id="file" class="custom-file-input" type="file" name="image">
                      <span class="custom-file-control"></span> </label>
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