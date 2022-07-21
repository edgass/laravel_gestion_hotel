<center>SITUATION COMPTABLE</center>
<br>
<br>
<br>
<br>
<table class="table">
    <thead class="bg-primary text-white">
    <tr>
        <th scope="col">ACTIFS</th>
        <th scope="col">MONTANTS</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">HEBERGEMENT</th>
    </tr>
    @php
        $sommeA = 0 ;
        $sommeS = 0;
    @endphp
    @foreach($prestationsH as $ph)
        <tr>
            <th scope="row">{{$ph->idPrestation}}  |  {{$ph->datePrestation}}  | {{$ph->detailPrestation}}</th>
            <td>{{$ph->prixPresta}}</td>
        </tr>
        @php
            $sommeA += $ph->prixPresta ;
        @endphp
    @endforeach
    <tr>
        <th scope="row">RESTAURATION</th>
    </tr>
    @foreach($prestationsR as $pr)
        <tr>
            <th scope="row">{{$pr->idPrestation}}  |  {{$pr->datePrestation}}  | {{$pr->detailPrestation}}</th>
            <td>{{$pr->prixPresta}}</td>
        </tr>
    @endforeach
    <tr>
        <th scope="row">PARKING</th>
    </tr>
    @foreach($prestationsPk as $pk)
        <tr>
            <th scope="row">{{$pk->idPrestation}}  |  {{$pk->datePrestation}}  | {{$pk->detailPrestation}}</th>
            <td>{{$pk->prixPresta}}</td>
        </tr>
    @endforeach
    <tr>
        <th scope="row">PISCINE</th>
    </tr>
    @foreach($prestationsPi as $pi)
        <tr>
            <th scope="row">{{$pi->idPrestation}}  |  {{$pi->datePrestation}}  | {{$pi->detailPrestation}}</th>
            <td>{{$pi->prixPresta}}</td>
        </tr>
    @endforeach
    <tr><td></td></tr>
    <tr>
        <th scope="row">TOTAL DES RECETTES</th><td>{{$sommeA}}</td>
    </tr>
    </tbody>
</table>
<br>
<br>
<br>
<table class="table">
    <thead class="bg-primary text-white">
    <tr>
        <th scope="col">PASSIFS</th>
        <th scope="col">MONTANTS</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">SALAIRES DES EMPLOYES</th>
        @foreach($salaires as $salaire)
            @php
                $sommeS += $salaire->salaireEmp;
            @endphp
        @endforeach
    </tr>
    <tr><td></td></tr>
    <tr>
        <th scope="row">TOTAL DES PASSIFS</th><td>{{$sommeS}}</td>
    </tr>
    </tbody>
</table>
<br>
<br>
<br>
<br>

<div>
    <label >Montant total à payer</label>
    <input class="form-control" id="date1" type="text" name="" disabled="disabled" value="{{$sommeS}}">
</div>
