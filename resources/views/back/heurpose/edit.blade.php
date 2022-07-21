@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FORMULAIRE DE MODIFICATION</h4>
                                <a class="btn  btn-primary" href="{{route('heurpose.index')}}">lister</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session()->has('message'))
                                    <div class="alert alert-icon alert-success" >
                                    <em  class="icon li li-alert-circle"></em>
                                    {
                                    
                                    {La heurpose a ete bein modifier}
                                        }
                                    </div>
                                    @endif
                                    
                                    @if($errors->any())
                                    @foreach($errors->all() as $error))
                                    <div class="alert alert-icon alert-danger" >
                                    <em  class="icon li  li-alert-circle"></em>
                                        {
                                            {$error}
                                        }
                                    </div>
                                    @endforeach
                                    @endif
                                     @foreach($heurpose as $heurpose)
                                    <form action="{{route('heurpose.update', $heurpose->idheurpose)}}" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="id" value="{{$heurpose->idheurpose}}">
            
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Matricule Emp</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="matEmp" placeholder="" value="{{$heurpose->matEmp}}">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nom d employe</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nomEmp"class="form-control" placeholder="" value="{{$heurpose->nomEmp}}">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Heur de pose</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="heurpose"class="form-control" placeholder="" value="{{$heurpose->heurpose}}">
                                            </div>
                                            </div>
                                             <div class="col-md-6">
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