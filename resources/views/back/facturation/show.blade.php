@extends('back.index')
@section('contenu')
    <div class="content">
        <div class="info-box">
            <h4 class="text-black m-b-3">Infos de la facture</h4>
            <div id="demo">
                <div class="step-app">
                    <div class="step-content">
                        <div class="step-tab-panel" id="step1">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="row m-t-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName1">Numéro de pièce d'identité du client</label>
                                            <input class="form-control" type="text" name="" disabled="disabled" value="{{$client->numPieceID}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1">Prenom du client</label>
                                            <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->prenomClient}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1">Nom du client</label>
                                            <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->nomClient}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1">Numéro de téléphone du client</label>
                                            <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->telClient}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1">Adresse du client</label>
                                            <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->adresseClient}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1">Email du client</label>
                                            <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->emailClient}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-12"><div class="table-responsive">
                                            <table id="example2" class="table table-bordered table-hover" data-name="cool-table">
                                                <thead>
                                                <tr>
                                                    <th>TYPE DE PRESTATION</th>
                                                    <th>DETAILS</th>
                                                    <th>PRIX</th>
                                                    <th>TAXE</th>
                                                    <th>MONTANT</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $somme= 0 ;
                                                    $prix = 0 ;
                                                @endphp
                                                @foreach($prestations as $prestation)
                                                    <tr>
                                                        <td>{{$prestation->typePrestation}}</td>
                                                        <td>{{$prestation->detailPrestation}}</td>
                                                        <td>{{$prestation->prixPresta}}</td>
                                                        <td>10%</td>
                                                        <td>
                                                            @php
                                                                $prix = ($prestation->prixPresta)*1.1 ;
                                                            @endphp
                                                            {{$prix}}
                                                        </td>
                                                    </tr>

                                                    @php
                                                        $somme += $prix ;
                                                    @endphp

                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date1">MONTANT TOTAL A PAYER</label>
                                                    <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$somme}}">
                                                </div>
                                                <div class="btn btn btn-rounded btn-light"><a href="{{route('printFacture',$id)}}">IMPRIMER</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="step-footer">
        </div>
    </div>
    </div>
    </div>
@endsection
