@extends('layouts.app',['title'=>'Participation à la collecte'])

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<style>
td.job-dt {
      padding: 12px 3px;
      margin-bottom: 0;
}
.dataTables_length, .dataTables_filter {
      display: none;
}
th,td{
      text-align: center;
}
</style>
@endpush

@push('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="src/datatable-setting.js"></script>
<script>
      $(document).ready(function () {
          let table = $(".data-table.collecte").DataTable();
          table.page.len(10);
          table.draw();
      });
  </script>
@endpush


@section('content')
   <section class="companies-info" style="height:91vh;background:white;padding-top:30px;">
         <div class="container">
               <div class="company-title" style="margin-bottom: 15px;">
                     <h3  style="background:limegreen;">Liste des participations a la collecte en cours</h3>
               </div><!--company-title end-->
               <div class="companies-list">
                  <div class="row">
                        @if($collecte_en_cour != null)
                              <div class="col-md-12">
                                    <table class="data-table collecte table stripe hover nowrap">
                                          <thead>
                                          <tr>
                                                <th class="table-plus">Matricule</th>
                                                <th>Nom</th>
                                                <th>Zone</th>
                                                <th>Participation</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                                @if($participants_final != null)
                                                      @foreach($participants_final as $pt) 
                                                      <tr>
                                                            <th scope="row">{{$pt['matricule']}}</th>
                                                            <td>{{$pt['name']}}</td>
                                                            <td>{{$pt['zone']}}</td>
                                                            <td class="job-dt">
                                                                  @if ($pt['participation'] == "Oui")
                                                                        <li><a href="#" title="">{{$pt['participation']}}</a></li>
                                                                  @else
                                                                        <li><a href="#" title="" style="background: #F55353">{{$pt['participation']}}</a></li>
                                                                  @endif
                                                            </td> 
                                                      </tr>
                                                      @endforeach
                                                @endif
                                          </tbody>
                                    </table>
                              </div>
                              <!--end table end-->
                              <h3 class="col-md-12"style="margin-top:7px;margin-bottom:8px;color:#e44d3a;font-size:16px;font-weight:bold;">
                                    Statistique
                              </h3>
                              <ul class="col-md-12">
                                    <li style="font-size: 17px;margin-bottom:8px;">- Nombre de participant:
                                          <strong style="color:#295fa6;font-weight:bold;text-shadow: 3px 5px 6px #0477bf;">
                                          {{$nbparticipants}}
                                          </strong>
                                    </li>
                                    <li style="font-size: 17px;">
                                          - Somme totale recollecte:
                                          <strong style="color:#248e38;font-weight:bold;text-shadow: 3px 5px 6px #abdca7;">
                                          {{ $nbparticipants * $collecte_en_cour->montant_cotisation }} Fcfa
                                          </strong>
                                    </li>
                              </ul>
                        @endif
                  </div>
               </div>
         </div>
   </section><!--companies-info end-->

   {{-- footer --}}
   {{-- @include('layouts.footer') --}}

@endsection
