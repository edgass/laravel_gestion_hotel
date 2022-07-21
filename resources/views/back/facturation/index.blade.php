@extends('back.index')
@section('contenu')
<h4 class="text-black">List des factures</h4>
      {{--<p>Export data to Copy, CSV, Excel, PDF & Print</p>--}}
      <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-hover" data-name="cool-table">
                    <thead>
                        <tr>
                        <th>ID Facture</th>
                        <th>Date due la facture</th>
                        <th>Type de facture</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($factures as $facture)
                      <tr>
                          <td>{{$facture->idFacture}}</td>
                          <td>{{$facture->dateDue}}</td>
                          <td>{{$facture->typeFacture}}</td>
                          <td>
                              <a href="{{route('facture.show',$facture->idFacture)}}" class="btn btn btn-rounded btn-primary"><i class="fa fa-eye" >  DETAILS</i></a>
                              @if($facture->etat==1)
                                  Facture déjà payée
                              @else($facture->etat==0)
                                  <a href="{{route('facture.state',$facture->idFacture)}}" class="btn btn btn-rounded btn-success"><i class="fa fa-money" >  Paiement</i></a>
                              @endif
                          </td>
                          <td>
                              <div class="btn btn btn-rounded btn-light"><a href="{{route('printFacture',$facture->idFacture)}}">IMPRIMER</a></div>
                          </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  </div>
      </div>
@endsection
