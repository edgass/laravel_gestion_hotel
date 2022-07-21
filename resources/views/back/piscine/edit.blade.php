@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FORMULAIRE DE MODIFICATION</h4>
                                <a class="btn  btn-primary" href="{{route('piscine.index')}}">lister</a>
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
                                     @foreach($piscine as $piscine)
                                    <form action="{{route('piscine.update', $piscine->idpiscine)}}" method="post" enctype="multipart/-date">
                                        @csrf
                                        @method('put')
                                    <input type="hidden"  name="idpiscine" value="{{$piscine->idpiscine}}">

                                         <div class="col-md-12">
                                          <div class="form-group has-feedback">
                                            <label class="custom-file center-block block">
                                              <input id="file" class="custom-file-input" type="file" name="image">
                                              <span class="custom-file-control"></span> </label>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Prix de la piscine</label>
                                                <input class="form-control" placeholder="" name="prixPiscine" type="text">
                                                <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
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
