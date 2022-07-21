@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FORMULAIRE POUR VOIR</h4>
                                <a class="btn  btn-primary" href="{{route('heursortie.index')}}">lister</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session()->has('message'))
                                    <div class="alert alert-icon alert-success" >
                                    <em  class="icon li li-alert-circle"></em>
                                    {
                                    
                                    {La heursortie a ete bein modifier}
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
                                    @foreach($heursortie as $heursortie)
                                    <form action="" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="id" value="{{$heursortie->idheursortie}}" >
            
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Matricule Emp</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="matEmp" placeholder="" value="{{$heursortie->matEmp}}" disabled="disabled">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nom d employe</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nomEmp"class="form-control" placeholder="" value="{{$heursortie->nomEmp}}" disabled="disabled">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Heur de sortie</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="heursortie"class="form-control" placeholder="" value="{{$heursortie->heursortie}}" disabled="disabled">
                                            </div>
                                            </div> 

                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

@endsection