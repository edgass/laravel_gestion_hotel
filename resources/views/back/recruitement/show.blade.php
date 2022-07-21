@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vertical Form</h4>
                                <a class="btn  btn-primary" href="{{route('recruitement.index')}}">lister</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session()->has('message'))
                                    <div class="alert alert-icon alert-success" >
                                    <em  class="icon li li-alert-circle"></em>
                                    {
                                    
                                    {La recruitement a ete bein modifier}
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
                                    @foreach($recruitement as $recruitement)
                                    <form action="" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="idrecruitement" value="{{$recruitement->idrecruitement}}">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nom</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nomCand"placeholder="" value="{{$recruitement->nomCand}}" disabled="disabled">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Prenom</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="prenomCand" placeholder="" value="{{$recruitement->prenomCand}}" disabled="disabled">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telephone</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="telCand"class="form-control" placeholder="" value="{{$recruitement->telCand}}" disabled="disabled">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="emailCand"class="form-control" placeholder="" value="{{$recruitement->emailCand}}" disabled="disabled">
                                            </div>
                                            </div>
                                           <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Adresse</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="" name="adresseCand" value="{{$recruitement->adresseCand}}" disabled="disabled">
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                      <div class="form-group has-feedback">
                                          <img src="{{asset('uploads/image/'.$recruitement->image)}}" width="100px" alt="" disabled="disabled">
                                          
                                      </div>
                                    </div>
                                          <div class="form-group has-feedback">
                                          <label class="control-label">Pays Residance</label>
                                          <select name="paysResidance" class="form-control" type="text" value="{{$recruitement->paysResidance}}" disabled="disabled">
                                                                            <option >Comore</option>
                                                                            <option >Gunie</option>
                                                                            <option >Senegal</option>
                                                                            <option >Mali</option>
                                                                            <option >Togo</option>
                                                                        </select> 
                                        </div>
                                        </div>


                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

@endsection