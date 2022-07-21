@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FORMULAIRE DE MODIFICATION</h4>
                                <a class="btn  btn-primary" href="{{route('parking.index')}}">lister</a>
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
                                    @foreach($parking as $parking)
                                    <form action="{{route('parking.update', $parking->idparking)}}" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="id" value="{{$parking->idparking}}">
            
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Numero_parking</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="numeroplace" placeholder="" value="{{$parking->numeroplace}}">
                                            </div>
                                            </div>
                                             <div class="col-md-6">
                                              <div class="form-group has-feedback">
                                                <label class="control-label">Prix par jour</label>
                                                 <select name="prixjour" class="form-control" type="text" value="{{$parking->prixjour}}">
                                                                         <option >5000f/j</option>
                                                                         <option >10000f/mois</option>
                                                                        </select> 
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