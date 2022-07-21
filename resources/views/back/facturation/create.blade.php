@extends('Back office.index')
@section('content')
<div class="content">
      <div class="info-box">
        <h4 class="text-black m-b-3">Nouvelle facture</h4>
        <div id="demo">
          <div class="step-app">
            <div class="step-content">
              <div class="step-tab-panel" id="step1">
                <form method="POST" action="{{route('facture.store')}}" enctype="multipart/form-data">
                @csrf
                  <div class="row m-t-2">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstName1">Numéro de pièce d'identité du client</label>
                        <input class="form-control" type="text" name="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="date1">Heure de réservation</label>
                        <input class="form-control" id="date1" type="time" name="heureReservation">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="date1">Date de réservation</label>
                        <input class="form-control" id="date1" type="date" name="dateReservation">
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="intType1">Nombre de personnes</label>
                      <select class="custom-select form-control" id="intType1" data-placeholder="Type to search cities" name="nbrPersonnes">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="intType1">Table réservée</label>
                      <select class="custom-select form-control" id="intType1" data-placeholder="Type to search cities" name="intType1">
                        @foreach($table_restaurants as $table_restaurant)
                            <option value="1">{{$table_restaurant->numTable}}</option>
                        @endforeach
                      </select>
                    </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                </form>

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
