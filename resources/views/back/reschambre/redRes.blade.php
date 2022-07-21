@extends('back.index')
@section('contenu')
    <div class="m-b-3">
            <button type="submit" class="btn btn btn-rounded btn-light"><a href="{{route('createC')}}">Nouveau Client</a></button>
        <br>
        <br>
            <button type="submit" class="btn btn btn-rounded btn-light"><a href="{{route('reschambre.create2')}}">Client existant</a></button>
    </div>
@endsection
