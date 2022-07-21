@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FORMULAIRE DE MODIFICATION</h4>
                                <a class="btn  btn-primary" href="{{route('table_restaurant.index')}}">lister</a>
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
                                    @foreach($table_restaurant  as $table_restaurant)
                                    <form action="{{route('table_restaurant.update', $table_restaurant->idtable_restaurant)}}" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="idtable_restaurant" value="{{$table_restaurant->idtable_restaurant}}">
            
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Numero_table_restaurant</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="numerotable" placeholder="" value="{{$table_restaurant->numerotable}}">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nombre de personne</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nbrpersonne"class="form-control" placeholder="" value="{{$table_restaurant->nbrpersonne}}">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nombre de place</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nbrplace"class="form-control" placeholder="" value="{{$table_restaurant->nbrplace}}">
                                            </div>
                                            </div>
                                         <div class="col-md-12">
                                          <div class="form-group has-feedback">
                                            <label class="custom-file center-block block">
                                              <input id="file" class="custom-file-input" type="file" name="image">
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