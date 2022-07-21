@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FORMULAIRE POUR VOIR</h4>
                                <a class="btn  btn-primary" href="{{route('chambre.index')}}">lister</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session()->has('message'))
                                    <div class="alert alert-icon alert-success" >
                                    <em  class="icon li li-alert-circle"></em>
                                    {
                                    
                                    {La chambre a ete bein modifier}
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
                                    @foreach($chambre as $chambre)
                                    <form action="" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="idchambre" value="{{$chambre->idchambre}}">
                                       
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Numero_chambre</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="numeroChambre" placeholder="" value="{{$chambre->numeroChambre}}" disabled="disabled">
                                            </div>
                                            </div>
                                             <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nombre de personne</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nombre_personne"class="form-control" placeholder="" value="{{$chambre->nombre_personne}}" disabled="disabled">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Taille du chambre</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="tailleChambre"class="form-control" placeholder="" value="{{$chambre->tailleChambre}}" disabled="disabled">
                                            </div>
                                            </div>
                                           <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Prix du chambre</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="" name="prixChambre" value="{{$chambre->prixChambre}}" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                          <img src="{{asset('uploads/image/'.$chambre->image)}}" width="100px" alt="" disabled="disabled">
                                      </div>
                                    </div>
                                    </div>

                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

@endsection