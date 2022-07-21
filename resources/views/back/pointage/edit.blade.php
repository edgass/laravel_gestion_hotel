@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vertical Form</h4>
                                <a class="btn  btn-primary" href="{{route('employe.index')}}">lister</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session()->has('message'))
                                    <div class="alert alert-icon alert-success" >
                                    <em  class="icon li li-alert-circle"></em>
                                    {
                                    
                                    {La employe a ete bein modifier}
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
                                    <form action="{{route('employe.update', $employe->idemploye)}}" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="idemploye" value="{{$employe->idemploye}}">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nom</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nomEmp"placeholder="" value="{{$employe->nomEmp}}">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Prenom</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="prenomEmp" placeholder="" value="{{$employe->prenomEmp}}">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telephone</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="telEmp"class="form-control" placeholder="" value="{{$employe->telEmp}}">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="emailEmp"class="form-control" placeholder="" value="{{$employe->emailEmp}}">
                                            </div>
                                            </div>
                                           <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Adresse</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="" name="adresseEmp" value="{{$employe->adresseEmp}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fonction</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="" name="fonctionEmp" value="{{$employe->fonctionEmp}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Salaire</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="" name="salaireEmp" value="{{$employe->salaireEmp}}">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection