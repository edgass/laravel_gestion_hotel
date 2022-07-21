<center>FACTURE N° {{$facture->idFacture}}</center>
<br>
<br>
<div >
    <label >Prenom du client</label>
    <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->prenomClient}}">
</div>
<div >
    <label >Nom du client</label>
    <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->nomClient}}">
</div>
<div >
    <label >Numéro de téléphone du client</label>
    <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->telClient}}">
</div>
<div >
    <label >Adresse du client</label>
    <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->adresseClient}}">
</div>
<div >
    <label >Email du client</label>
    <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->emailClient}}">
</div>
<div>
    <label >Numéro de pièce d'identité du client</label>
    <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$client->numPieceID}}">
</div>
<br>
<br>
<br>
<table style="border-collapse: collapse">
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
        <tr style="border: 1px solid #999;padding: 0.5rem;
  text-align: left">
            <td style="border: 1px solid #999;padding: 0.5rem;
  text-align: left;">{{$prestation->typePrestation}}</td>
            <td style="border: 1px solid #999;padding: 0.5rem;
  text-align: left;">{{$prestation->detailPrestation}}</td>
            <td style="border: 1px solid #999;padding: 0.5rem;
  text-align: left;">{{$prestation->prixPresta}}</td>
            <td style="border: 1px solid #999;padding: 0.5rem;
  text-align: left;">10%</td>
            <td style="border: 1px solid #999;padding: 0.5rem;
  text-align: left;">
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
<br>
<br>
<br>
<br>

<div>
    <label >Montant total à payer</label>
    <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$somme}}">
</div>
