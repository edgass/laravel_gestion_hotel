@extends('back.index')
@section('contenu')
<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FORMULAIRE POUR VOIR</h4>
                                <a class="btn  btn-primary" href="{{route('piscine.index')}}">lister</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session()->has('message'))
                                    <div class="alert alert-icon alert-success" >
                                    <em  class="icon li li-alert-circle"></em>
                                    {
                                    
                                    {La piscine a ete bein modifier}
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
                                    @foreach($piscine as $piscine)
                                    <form action="" method="post" enctype="multipart/-date">
                                        @csrf 
                                        @method('put')
                                    <input type="hidden"  name="idpiscine" value="{{$piscine->idpiscine}}">
                                            <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Prix par heur</label>
                     <select name="prixheur" class="form-control" type="text" value="{{$piscine->prixheur}}" disabled="disabled">
                                                                    
                                                                         <option >500f/1h</option>
                                                                         <option >1000f/2h</option>
                                                                         <option >1500f/5h</option>
                                                                         <option >5000f/24h</option>
                                                                        </select> 
                </div>
                </div> 
                                        <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                          <img src="{{asset('uploads/image/'.$piscine->image)}}" width="100px" alt="" disabled="disabled">
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